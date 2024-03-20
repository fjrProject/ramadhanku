<?php

namespace Database\Seeders;

use App\Models\Ibadah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IbadahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $data = [
                "category" => "al-quran",
                "hukum" => "sunnah",
                "name" =>  "al-quran",
                "point" => 1
            ];
            Ibadah::create($data);
        
        
    }
}
