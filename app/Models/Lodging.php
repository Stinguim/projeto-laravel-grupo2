<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lodging extends Model
{
    protected $table = 'lodging';
    public $timestamps = false;
    protected $primaryKey = 'id_lodging';

    use HasFactory, Notifiable;

    /**
    * @var list<string>
    */

    protected $fillable = [
        'name',
        'description',
        'address',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id_user');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function cleaningRequest(){
        return $this->hasMany(CleaningRequest::class, 'id_cleaning_request');
    }
}
