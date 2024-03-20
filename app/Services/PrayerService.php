<?php 
    namespace App\Services;
    interface PrayerService{
        public function getWaktu(string $city, string $date);
       
    }