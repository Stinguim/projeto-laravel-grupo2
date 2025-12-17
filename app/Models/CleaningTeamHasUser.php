<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CleaningTeamHasUser extends Model
{
    protected $table = 'cleaning_team_has_user';

    public $timestamps = false;
    protected $fillable = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cleaningTeam(){
        return $this->belongsTo(CleaningTeam::class, 'cleaning_team_id');
    }
}
