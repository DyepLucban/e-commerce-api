<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use DatabaseTransactions;

    /** @test **/
    public function show_cart_on_authenticated_user()
    {
        $this->authenticatedUser();

        $this->get('/api/cart')->assertStatus(200);
    }

    /** @test **/
    public function no_cart_shown_on_unauthenticated_user()
    {
        $this->get('/api/cart')->assertStatus(302);
    }    

    /** @test **/
    public function add_item_to_cart_on_authenticated_user()
    {
        $this->authenticatedUser();

        $this->post('/api/cart', $this->cartItem())->assertStatus(200);
    }

    /** @test **/
    public function remove_item_to_cart_on_authenticated_user()
    {
        $this->authenticatedUser();

        $this->delete('/api/cart/1', $this->cartItem(['id']))->assertStatus(200);
    }

    private function authenticatedUser()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['address' => 'test address']);

        $this->actingAs($user, 'sanctum');        
    }

    private function cartItem()
    {
        return [
            'id' => 1,
            'user_id' => 1,
            'product_id' => 1,
            'qty' => 1,
        ];
    }    
}
