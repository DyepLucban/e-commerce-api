<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    /** @test **/
    public function show_all_products_on_authenticated_user()
    {
        $user = factory(User::class)->create(['address' => 'test address', 'role' => 2]);

        $this->actingAs($user, 'sanctum');

        $this->get('/api/product')->assertStatus(200);
    }
}
