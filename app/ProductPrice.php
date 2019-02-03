<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPrice extends Model
{
    Use SoftDeletes;

    protected $table = TABLE_PRODUCT_PRICES;
    protected $guarded = [];
}
