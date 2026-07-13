<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'phone'];

    protected $hidden = ['password', 'remember_token'];

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isTourismOfficer(): bool { return $this->role === 'tourism_officer'; }
    public function isGuide(): bool { return $this->role === 'guide'; }
    public function isTourist(): bool { return $this->role === 'tourist'; }

    public function guide()
    {
        return $this->hasOne(Guide::class);
    }
}
