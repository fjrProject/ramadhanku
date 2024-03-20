<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "username";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        "username", 
        "password",
        "point",
        "city_code"
    ];

    public function getAuthIdentifierName(){
        return "username";
    }

    public function getAuthIdentifier(){
        return $this->username;
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){
    
    }

    public function setRememberToken($value){
    
    }

    public function getRememberTokenName(){
    
    }
}
