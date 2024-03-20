<?php 
    namespace App\Services\Impl;
    use App\Services\PrayerService;
    class PrayerServiceImpl implements PrayerService{
        public function getWaktu(string $city, string $date){
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.myquran.com/v2/sholat/jadwal/$city/$date",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ]);
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);
    
            $data = $response["data"];
    
            return $data;
        }
    }