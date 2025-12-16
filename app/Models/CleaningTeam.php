<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleaningTeam extends Model
{
    protected $table = 'cleaning_teams';
    protected $primaryKey = 'id_cleaning_team';
    public $timestamps = false;
    protected $fillable = [

    ];

    public function cleaningRequest(){
        return $this->hasMany(Cleaning::class, 'cleaning_team_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function employ(){
        return $this->hasMany(User::class, 'user_id')->where('user_type', 'employ');
    }

    public function supervisor(){
        return $this->belongsTo(User::class, 'user_id')->where('user_type', 'supervisor');
    }

}
