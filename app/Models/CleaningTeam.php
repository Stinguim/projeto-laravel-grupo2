<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CleaningTeam extends Model
{
    use HasFactory;

    protected $table = 'cleaning_team';
    protected $primaryKey = 'id_cleaning_team';
    public $timestamps = false;
    protected $fillable = [
        'company_id'
    ];

    public function cleanings()
    {
        return $this->hasMany(
            Cleaning::class,
            'cleaning_team_id',
            'id_cleaning_team'
        );
    }

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
