<?php

namespace App\Models;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable implements JWTSubject
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'id';

    public $timestamp = false;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getJWTIdentifier() 
    {
        return $this->getKey();   
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
