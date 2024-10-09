<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'type_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function userType(){
        return $this->belongsTo(UserType::class, 'type_id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function alumni(){
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
    

    // middleware
    public function isAdmin(): bool
    {
        return $this->type_id === 1;
    }

    public function isTeacher(): bool
    {
        return $this->type_id === 2;
    }

    public function isStudent(): bool
    {
        return $this->type_id === 3;
    }

    public function isUser(): bool
    {
        return $this->type_id === 4;
    }

}
