<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductPriceTest extends TestCase
{

    public static function setUpBeforeClass()
    {
        (new self())->createApplication();

    }

    function setUp()
    {
        parent::setUp();
    }

    protected function headers($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token = $user->createToken('Token Name')->accessToken;
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $headers;
    }

    /**
     * Test Broadband data
     *
     * @return void
     */
    public function testBroadband()
    {

        $user = factory(User::class)->create();

        $data = ['provider_name' => 'Internet', 'product_name' => '100MB'];

        $response = $this->json('GET', '/api/v1/prices', $data,  $this->headers($user));

        $response->assertStatus(200);
        $response->assertJson(["price" => [
            "price_value" => 30.25
        ]]);

    }


    /**
     * Test Energy data
     *
     * @return void
     */
    public function testEnergy() {
        $user = factory(User::class)->create();

        $data = ['provider_name' => 'mpower', 'product_name' => 'standard', 'product_variation' => 'northern'];

        $response = $this->json('GET', '/api/v1/prices', $data,  $this->headers($user));

        $response->assertStatus(200);
        $response->assertJson(["price" => [
            "price_value" => 51.95
        ]]);
    }


    /**
     * Test price update
     *
     * @return void
     */
    public function testUpdatePrice() {
        $user = factory(User::class)->create();

        $data = ['provider_name' => 'mpower', 'product_name' => 'standard', 'product_variation' => 'midlands', 'new_price' => 34.99];

        $response = $this->json('PATCH', '/api/v1/prices', $data,  $this->headers($user));

        $response->assertStatus(200);
        $response->assertJson(["status" => 'success']);
    }
}
