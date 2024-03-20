<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chek extends Model
{
    use HasFactory;

    protected $table = "cheks";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        "username",
        "ibadah",
        "hijriyah",
        "point"
    ];
}
