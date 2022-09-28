<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{

    use HasFactory;
    protected $table = 'report_details';

    protected $fillable = [
        'report_id', 'store_id', 'product_id', 'count', 'price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'remember_token',
    ];

    public function stores()
    {


        return $this->belongsto(Store::class, 'store_id', 'id');
    }

    public function reports()
    {


        return $this->belongsto('App\Models\Report', 'report_id', 'id');
    }

    public function products()
    {


        return $this->belongsto(Product::class, 'product_id', 'id');
    }

    public function users()
    {


        return $this->belongsto(User::class, 'user_id', 'id');
    }

}

