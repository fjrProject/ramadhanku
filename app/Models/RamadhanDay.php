<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RamadhanDay extends Model
{
    use HasFactory;

    protected $table = "ramadhan_days";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        "start_masehi",
        "end_masehi",
        "hijriyah"  
    ];
}
