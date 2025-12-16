<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'user'; // <-- ADD THIS
    public $timestamps = false;   // <--- ADD THIS
    protected $primaryKey = 'id_user';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
//            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(){
        return $this->user_type === 'admin';
    }

    public function isSupervisor(){
        return $this->user_type === 'supervisor';
    }

    public function isEmployee(){
        return $this->user_type === 'employ';
    }

    public function isClient(){
        return $this->user_type === 'client';
    }


    public function lodging(){
        return $this->hasOne(Lodging::class, 'id_lodging');
    }

    public function cleaningRequest(){
        return $this->hasMany(CleaningRequest::class,'id_cleaning_request');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function cleaning(){
        return $this->hasOne(Cleaning::class, 'id_cleaning');
    }

    public function cleaningTeam(){
        return $this->belongsTo(CleaningTeam::class, 'id_cleaning_team');
    }

    public function supervisorTeam(){
        return $this->hasMany(CleaningTeam::class, 'id_cleaning_team');
    }

}
