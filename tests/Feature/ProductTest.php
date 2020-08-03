<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /** @test **/
    public function show_all_products_on_authenticated_user()
    {
        $response = $this->get('/api/auth_user');

        $response->assertStatus(200);
    }
}
