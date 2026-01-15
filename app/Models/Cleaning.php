<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cleaning extends Model
{
    use HasFactory;

    protected $table = 'cleaning';

    public $timestamps = false;

    protected $fillable = [
        'date',
        'estado',
    ];

    public function cleaningRequest(){
        return $this->hasOne(CleaningRequest::class, 'id_cleaning_request');
    }

    public function cleaningTeam(){
        return $this->hasMany(CleaningTeam::class, 'id_cleaning_team');
    }

    public function supervisor(){
        return $this->hasOne(User::class, 'user_id')->where('user_type', 'supervisor');
    }

}
