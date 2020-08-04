<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseTransactions;

    /** @test **/
    public function checkout_all_items_in_cart()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['address' => 'test address']);

        $this->actingAs($user, 'sanctum');

        $this->post('/api/order', $this->orderItem())->assertStatus(200);
    }

    private function orderItem()
    {
        return [
            'user_id' => 1,
            'ordered_item' => [
                "id" =>  2,
                "user_id" => 1,
                "product_id" => 3,
                "quantity" => 1,
                "created_at" => "2020-08-03T10:48:59.000000Z",
                "updated_at" => "2020-08-03T10:48:59.000000Z",
                "product" =>  [
                    "id" => 3,
                    "product_name" =>  "Product 3",
                    "product_price" =>  "1000",
                    "product_desc" =>  "Lorem ipsum",
                    "created_at" =>  "2020-08-03T09:14:20.000000Z",
                    "updated_at" =>  "2020-08-03T09:14:20.000000Z"
                ],
            ],
            'total' => 1100,
            'mop' => 'MOP',
        ];        
    }
}
