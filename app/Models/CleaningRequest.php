<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningRequest extends Model
{
    use HasFactory;

    protected $table = 'cleaning_request';
    protected $primaryKey = 'id_cleaning_request';

    public $timestamps = false;

    protected $fillable = [
        'data_cleaning_request',
        'descricao',
    ];

    public function lodging(){
        return $this->belongsTo(Lodging::class, 'id_lodging');
    }

    public function cleaning(){
        return $this->belongsTo(Cleaning::class, 'id_cleaning');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id_user');
    }
}
