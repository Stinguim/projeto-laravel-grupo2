<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{

    protected $table = 'cleaning_team';
    protected $primarykey = 'cleaning_request_id';
    protected $primaryKey = 'cleaning_team_id';

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
