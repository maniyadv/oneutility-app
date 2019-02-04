<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = TABLE_PROVIDERS;
    protected $guarded = [];


    /**
     * All products for a provider
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get a specific product for a provider
     * @param $productName
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|null|object
     */
    public function getProduct($productName) {
        return $this->products()->where(TABLE_PRODUCTS.'.name', 'like', "%$productName%")->first();
    }
}
