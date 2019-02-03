<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = TABLE_PRODUCTS;
    protected $guarded = [];


    public function provider() {
        return $this->belongsTo(Provider::class);
    }


    /**
     * The users blocked from the episode
     */
    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

}
