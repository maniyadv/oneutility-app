<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = TABLE_PRODUCTS;
    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider() {
        return $this->belongsTo(Provider::class);
    }


    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }


    public function getPrice($variation) {
        return $this->prices()->where(TABLE_PRODUCT_PRICES.'.variation', 'like', "%$variation%")->first();
    }



}
