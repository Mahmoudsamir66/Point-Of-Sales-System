<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsBuy extends Model
{
    use HasFactory;
    protected $table = 'reports_buys';

    protected $fillable = [
        'name','total','tax','date','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at' ,'updated_at','remember_token',
    ];

    public function users()
    {


        return $this->belongsto('App\Models\User', 'user_id', 'id');
    }

}


