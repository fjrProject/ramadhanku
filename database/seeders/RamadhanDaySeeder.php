<?php

namespace Database\Seeders;

use App\Models\RamadhanDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RamadhanDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 5; $i++){
            $s_day = 3 + $i;
            $e_day = 4 + $i;
            $data = [
                "start_masehi" => "2024-04-$s_day 19:00:00",
                "end_masehi" => "2024-04-$e_day 18:59:59",
                "hijriyah" => 24+$i
            ];
            RamadhanDay::create($data);
        }
    }
}
