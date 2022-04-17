<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable 
{
    use HasFactory;

    protected $table = 'admins';

    protected $guard = 'admins';

    protected $fillable = [
        'name', 'email', 'username', 'password', 'email_verified_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function keluhans() {
        return $this->hasMany(Keluhan::class);
    }
}
