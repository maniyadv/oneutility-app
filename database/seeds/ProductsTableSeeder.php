<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Broadband Providers
        self::seedBroadbandProducts();

        // Engery Providers
        self::seedEnergyProducts();

    }


    /**
     * Seed Broadband products
     */
    public static function seedBroadbandProducts(): void
    {
        Product::create([ 'id' => 1, 'name' => '100MB', 'description' => 'Broadband plan 1', 'provider_id' => 1 ]);
        Product::create([ 'id' => 2, 'name' => '200MB', 'description' => 'Broadband plan 2', 'provider_id' => 1 ]);
        Product::create([ 'id' => 3, 'name' => '300MB', 'description' => 'Broadband plan 3', 'provider_id' => 1 ]);
        Product::create([ 'id' => 4, 'name' => '17MB',  'description' => 'Broadband plan 4', 'provider_id' => 2 ]);
        Product::create([ 'id' => 5, 'name' => '72MB',  'description' => 'Broadband plan 5', 'provider_id' => 2 ]);
    }


    /**
     * Seed Energy products
     */
    public static function seedEnergyProducts(): void
    {
        Product::create([ 'id' => 6, 'name' => 'Standard tariff', 'description' => 'Energy plan 1', 'provider_id' => 3, ]);
        Product::create([ 'id' => 7, 'name' => 'Green tariff',    'description' => 'Energy plan 2', 'provider_id' => 3, ]);
        Product::create([ 'id' => 8, 'name' => 'Standard tariff', 'description' => 'Energy plan 3', 'provider_id' => 4, ]);
        Product::create([ 'id' => 9, 'name' => 'Saver tariff',    'description' => 'Energy plan 4', 'provider_id' => 4, ]);
    }

}
