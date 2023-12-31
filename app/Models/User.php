<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];

    public function createUser($data)
    {
        return $this->create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'level' => $data['level']
        ]);
    }
     

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }
}
