<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /** @test **/
    public function a_successul_login()
    {
        $this->post('/api/login', $this->data())->assertStatus(200);
    }

    /** @test **/
    public function a_successul_logout()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create(['address' => 'test address', 'role' => 2]);

        $this->actingAs($user, 'sanctum');

        $this->post('/api/logout')->assertStatus(200);
    }    

    /** @test **/
    public function email_field_is_required()
    {
        $this->post('/api/login', array_merge($this->data(), ['email' => '']))->assertStatus(422);
    }

    /** @test **/
    public function email_field_is_incorrect()
    {
        $this->post('/api/login', array_merge($this->data(), ['email' => 'erroruser@gmail.com']))->assertStatus(401);
    }    

    /** @test **/
    public function password_field_is_required()
    {
        $this->post('/api/login', array_merge($this->data(), ['password' => '']))->assertStatus(422);
    }        

    /** @test **/
    public function password_field_is_incorrect()
    {
        $this->post('/api/login', array_merge($this->data(), ['password' => 'wrongpassword']))->assertStatus(401);
    }        

    private function data()
    {
        return [
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'device_name' => 'browser',
            'role' => 1,
        ];
    }
}
