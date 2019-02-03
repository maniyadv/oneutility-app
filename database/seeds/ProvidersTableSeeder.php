<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Provider::create([
            'id'            => 1,
            'name'          => 'Internet corp.',
            'description'   => 'Broband Provider',
            'type'          => PROVIDER_TYPE_BROADBAND
        ]);

        Provider::create([
            'id'            => 2,
            'name'          => 'Dragonetworks',
            'description'   => 'Broband Provider',
            'type'          => PROVIDER_TYPE_BROADBAND
        ]);

        Provider::create([
            'id'            => 3,
            'name'          => 'Renewable energy co.',
            'description'   => 'Energy Provider',
            'type'          => PROVIDER_TYPE_ENERGY
        ]);

        Provider::create([
            'id'            => 4,
            'name'          => 'Mpower.',
            'description'   => 'Energy Provider',
            'type'          => PROVIDER_TYPE_ENERGY
        ]);

    }
}
