<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cleaning extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $table = 'cleaning';

    public $timestamps = false;

    protected $fillable = [
        'cleaning_request_id',
        'cleaning_team_id',
        'date',
        'estado'
    ];

    public function cleaningRequest(){
        return $this->belongsTo(
            CleaningRequest::class,
            'cleaning_request_id',
            'id_cleaning_request'
        );
    }

    public function cleaningTeam(){
        return $this->belongsTo(
            CleaningTeam::class,
            'cleaning_team_id',
            'id_cleaning_team'
        );
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'cleaning_team_has_user',
            'cleaning_team_id',
            'id_user'
        );
    }

}
