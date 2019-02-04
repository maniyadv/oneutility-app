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


    /**
     * Get all type of price for a product
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }


    /**
     * Get a product price
     * @param $variation
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|null|object
     */
    public function getPrice($variation) {
        return $this->prices()->where(TABLE_PRODUCT_PRICES.'.variation', '=', $variation)->first();
    }

}
