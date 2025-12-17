<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    public $timestamps = false;

    protected $primaryKey = 'id_company';

    protected $fillable = [
        'name',
    ];

    public function supervisor(){
        return $this->hasOne(User::class, 'user_id')->where('user_type', 'supervisor');
    }

    public function employe(){
        return $this->hasOne(User::class, 'user_id')->where('user_type', 'employ');
    }

    public function lodging(){
        return $this->hasMany(Lodging::class, 'id_lodging');
    }

    public function cleaningRequest(){
        return $this->hasMany(CleaningRequest::class, 'id_cleaning_request');
    }

    public function cleaningTeam(){
        return $this->hasOne(CleaningTeam::class, 'id_cleaning_team');
    }



}
