<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name', 'store_id', 'kind_id', 'code','photo',
        'storePlace', 'count', 'sellerPrice', 'purchasingPrice',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'remember_token',
    ];

    public function stors()
    {


        return $this->belongsto('App\Models\Store', 'store_id', 'id');
    }

    public function kinds()
    {


        return $this->belongsto('App\Models\Kind', 'kind_id', 'id');
    }

}
