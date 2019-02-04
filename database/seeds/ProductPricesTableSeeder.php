<?php

use Illuminate\Database\Seeder;
use App\ProductPrice;

class ProductPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Broadband Prices
        ProductPrice::create([ 'product_id' => 1, 'price' => 30, 'variation' => DEFAULT_PRICE_VARIATION ]);
        ProductPrice::create([ 'product_id' => 2, 'price' => 40, 'variation' => DEFAULT_PRICE_VARIATION ]);
        ProductPrice::create([ 'product_id' => 3, 'price' => 50, 'variation' => DEFAULT_PRICE_VARIATION ]);
        ProductPrice::create([ 'product_id' => 4, 'price' => 25, 'variation' => DEFAULT_PRICE_VARIATION ]);
        ProductPrice::create([ 'product_id' => 5, 'price' => 40, 'variation' => DEFAULT_PRICE_VARIATION ]);


        // Energy Prices
        ProductPrice::create([ 'product_id' => 6, 'price' => 54.12, 'variation' => PRICE_VARIATION_NORTHERN ]);
        ProductPrice::create([ 'product_id' => 6, 'price' => 56.50, 'variation' => PRICE_VARIATION_MIDLANDS ]);
        ProductPrice::create([ 'product_id' => 6, 'price' => 61.92, 'variation' => PRICE_VARIATION_SOUTHERN ]);

        ProductPrice::create([ 'product_id' => 7, 'price' => 64.85, 'variation' => PRICE_VARIATION_NORTHERN ]);
        ProductPrice::create([ 'product_id' => 7, 'price' => 68.21, 'variation' => PRICE_VARIATION_MIDLANDS ]);
        ProductPrice::create([ 'product_id' => 7, 'price' => 71.66, 'variation' => PRICE_VARIATION_SOUTHERN ]);

        ProductPrice::create([ 'product_id' => 8, 'price' => 51.95, 'variation' => PRICE_VARIATION_NORTHERN ]);
        ProductPrice::create([ 'product_id' => 8, 'price' => 52.00, 'variation' => PRICE_VARIATION_MIDLANDS ]);
        ProductPrice::create([ 'product_id' => 8, 'price' => 56.62, 'variation' => PRICE_VARIATION_SOUTHERN ]);

        ProductPrice::create([ 'product_id' => 9, 'price' => 42.57, 'variation' => PRICE_VARIATION_NORTHERN ]);
        ProductPrice::create([ 'product_id' => 9, 'price' => 45.22, 'variation' => PRICE_VARIATION_MIDLANDS ]);
        ProductPrice::create([ 'product_id' => 9, 'price' => 47.67, 'variation' => PRICE_VARIATION_SOUTHERN ]);





    }
}
