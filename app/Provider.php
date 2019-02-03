<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = TABLE_PROVIDERS;
    protected $guarded = [];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getProduct($productName) {
        return $this->products()->where(TABLE_PRODUCTS.'.name', 'like', "%$productName%")->first();
    }
}
