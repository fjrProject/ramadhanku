<?php

namespace App\Http\Controllers;

use App\Models\Chek;
use App\Models\Ibadah;
use App\Models\Quote;
use App\Models\RamadhanDay;
use App\Models\User;
use App\Services\PrayerService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected PrayerService $service;
    public function __construct(PrayerService $service){
        $this->service = $service;
    }
    public function getRegister(){
        return view("register");
    }
    public function register(Request $request){
        $data = $request->validate([
            "username" => ["required", "max:15"],
            "password" => "required", 
            "password2" => "required", 
            "city_code" => "required", 
        ]);
        if(User::find($data["username"])){
            return redirect()->back()->withErrors([
                "message" => "Username telah terdaftar. Silakan cari username lain" 
            ]);
        }
        if($data["password"] != $data["password2"]){
            return redirect()->back()->withErrors([
                "message" => "Konfirmasi password salah" 
            ]);
        }
        $data["password"] = Hash::make($data["password"]);
        User::create($data);

        $time = Carbon::now();
        $ramadhan = RamadhanDay::where("start_masehi", "<=", $time)->where("end_masehi", ">=", $time)->first()->hijriyah;
        $username = $data["username"];
        $data = [];

        for($i = 1; $i <= $ramadhan; $i++){
            $data[] = [
                "username" => $username,
                "hijriyah" => $i 
            ];
        }
        Chek::insert($data);

        return redirect()->route("login");
    }
    public function getLogin(){
        return view("login");
    }
    public function login(Request $request){
        $data = $request->validate([
            "username" => ["required", "max:15"],
            "password" => "required"
        ]);
        if(Auth::guard("user")->attempt($data, true)){
            return redirect()->route("dashboard");
        }
        else {
            return redirect()->back()->withErrors([
                "message" => "Username atau Password salah" 
            ]);
        }
    }
    public function logout(){
        Auth::guard("user")->logout();
        return redirect()->route("welcome");
    }
    public function dashboard(){
        $time = Carbon::now();
        // $time = "2024-03-12 20:20:20";
        $user = User::find(Auth::guard("user")->user()->username);
        $ramadhan = RamadhanDay::where("start_masehi", "<=", $time)->where("end_masehi", ">=", $time)->first()->hijriyah;
        
        if(!Chek::where("username", $user->username)->where("hijriyah", $ramadhan)->first()){
            Chek::create([
                "username" => $user->username,
                "hijriyah" => $ramadhan
            ]);
        }
        $checks = Chek::where("username", $user->username)->where("hijriyah", $ramadhan)->first();
        $check = explode("|", $checks->ibadah);
        $ibadahs = Ibadah::get();
        $ibadah = [];
        foreach($ibadahs as $item){
            $ibadah[] = $item;
        };

        $highScoreTotal = User::max("point");
        $highScoreDaily = Chek::where("hijriyah", $ramadhan)->max("point");

        $sholatDate = Carbon::now()->toDateString();
        $tanggal = Carbon::now()->format(" d M Y");
        $data = $this->service->getWaktu($user->city_code, $sholatDate);
        $waktuSholat = [
            "lokasi" =>  $data["lokasi"],
            "tanggal" => $tanggal,
            "jadwal" => $data["jadwal"]
        ];

        $quote = Quote::first();

        return view("dashboard")->with([
            "ramadhan" => $ramadhan,
             "check" => $check,
             "ibadah" => $ibadah,
             "point" => $checks->point,
             "total_point" => $user->point,
             "highScoreTotal" => $highScoreTotal,
             "highScoreDaily" => $highScoreDaily,
             "waktuSholat" => $waktuSholat,
             "quote" => $quote->quote,
             "quote_title" => $quote->title,
        ]);
    }
    public function submit(Request $request){
        $time = Carbon::now();
        // $time = "2024-03-12 20:20:20";
        $user = User::find(Auth::guard("user")->user()->username);
        $ramadhan = RamadhanDay::where("start_masehi", "<=", $time)->where("end_masehi", ">=", $time)->first()->hijriyah;

        $checked = [];
        $point = 0;
        $ibadah = Ibadah::get();

        for($i = 0; $i <= 21; $i ++){
            $check = "ibadah_$i";
            if($request->$check == null){
                $request->$check = "0";
            } 
            
            $point += (int) $ibadah[$i]->point * (int) $request->$check;
            $checked[] = $request->$check;
        }
        $checked = implode("|", $checked);
        $data = [
            "ibadah" => $checked,
            "point" => $point
        ];
        $check = Chek::where("username", $user->username)->where("hijriyah", $ramadhan)->first();
        $check->fill($data);
        $check->save();

        $pointTotal = Chek::where("username", $user->username)->sum("point");
        $user->point = $pointTotal;
        $user->save();

        return redirect()->route("dashboard");
    }
    public function history(Request $request){
        $user = User::find(Auth::guard("user")->user()->username);
        $time = Carbon::now();
        $ramadhan = RamadhanDay::where("start_masehi", "<=", $time)->where("end_masehi", ">=", $time)->first()->hijriyah;
        $checks = Chek::where("username", $user->username)->get();

        if($request->exists("id")){
            $check = Chek::where("username", $user->username)->where("hijriyah", $request->id)->first();
        }
        else{
            $check = Chek::where("username", $user->username)->where("hijriyah", $ramadhan)->first();
        }
        $hijriyah = $check->hijriyah;
        $point = $check->point;

        $check = explode("|", $check->ibadah);
        $ibadahs = Ibadah::get();
        $ibadah = [];
        foreach($ibadahs as $item){
            $ibadah[] = $item;
        };

        return view("history")->with([
            "hijriyah" => $hijriyah,
            "checks" => $checks,
            "check" => $check,
            "ibadah" => $ibadah,
            "point" => $point
        ]);
    }
    public function historyEdit(Request $request){
        $user = User::find(Auth::guard("user")->user()->username);
        $ramadhan = $request->ramadhan;

        $checked = [];
        $point = 0;
        $ibadah = Ibadah::get();

        for($i = 0; $i <= 21; $i ++){
            $check = "ibadah_$i";
            if($request->$check == null){
                $request->$check = "0";
            } 
            
            $point += (int) $ibadah[$i]->point * (int) $request->$check;
            $checked[] = $request->$check;
        }
        $checked = implode("|", $checked);
        $data = [
            "ibadah" => $checked,
            "point" => $point
        ];
        $check = Chek::where("username", $user->username)->where("hijriyah", $ramadhan)->first();
        $check->fill($data);
        $check->save();

        $pointTotal = Chek::where("username", $user->username)->sum("point");
        $user->point = $pointTotal;
        $user->save();

        return redirect()->route("history");
    }
    public function getEditQuote(){
        return view("quote");
    }
    public function editQuote(Request $request){
        $data = [
            "title" => $request->title,  
            "quote" => $request->quote,  
        ];
        $quote = Quote::find(1)->fill($data);
        $quote->save();
        return redirect()->route("dashboard");
    }
    public function poin(){
        $user = User::find(Auth::guard("user")->user()->username);
        $checks = Chek::where("username", $user->username)->get();
        $total = $checks->sum("point");
        return view("poin")->with([
            "checks" => $checks,
            "total" => $total
        ]);
    }
    
}