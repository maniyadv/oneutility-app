<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductPriceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPrices()
    {
        $product_id   = 7;
        $variation    = PRICE_VARIATION_MIDLANDS;
        $price        = 68.21;
        $this->assertDatabaseHas('product_prices', [
            'price' => $price,
            'product_id' => $product_id,
            'variation' => $variation
        ]);

        $product_id   = 10;
        $variation    = PRICE_VARIATION_MIDLANDS;
        $price        = 68.21;
        $this->assertDatabaseMissing('product_prices', [
            'price' => $price,
            'product_id' => $product_id,
            'variation' => $variation
        ]);

    }
}
