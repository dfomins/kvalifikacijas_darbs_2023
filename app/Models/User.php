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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'personal_code',
        'date_of_birth',
        'city',
        'street',
        'house_number',
        'password',
        'role_id',
        'profila_bilde',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function objects() {
        return $this->belongsToMany(WorkObject::class, 'object_to_user_relation', 'user_id', 'object_id');
    }

    public function work() {
        return $this->hasMany(Work::class, 'user_id', 'id');
    }

    public function getPictureAttribute($profila_bilde) {
        if (empty($profila_bilde)) {
            return asset('img/users/default.jpg');
        }
    }

}
