<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';

    protected $fillable = [
        'clint', 'store_id', 'kind_id', 'product_id','money','count','user_id'
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

    public function kinds()
    {


        return $this->belongsto('App\Models\Kind', 'kind_id', 'id');
    }
    public function products()
    {


        return $this->belongsto(Product::class, 'product_id', 'id');
    }public function users()
    {


        return $this->belongsto(User::class, 'user_id', 'id');
    }
}
