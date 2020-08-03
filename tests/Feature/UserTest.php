<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test **/
    public function a_successul_registration()
    {
        $this->post('/api/user', $this->data())->assertStatus(200);
    }

    /** @test **/
    public function name_field_is_required()
    {
        $this->post('/api/user', array_merge($this->data(), ['full_name' => '']))->assertStatus(422);
    }

    /** @test **/
    public function address_field_is_required()
    {
        $this->post('/api/user', array_merge($this->data(), ['address' => '']))->assertStatus(422);
    }

    /** @test **/
    public function password_field_is_required()
    {
        $this->post('/api/user', array_merge($this->data(), ['password' => '']))->assertStatus(422);
    }

    /** @test **/
    public function email_field_is_required()
    {
        $this->post('/api/user', array_merge($this->data(), ['email' => '']))->assertStatus(422);
    }

    /** @test **/
    public function data_in_email_field_is_a_valid_email()
    {
        $this->post('/api/user', array_merge($this->data(), ['email' => 'thisIsNotAnEmail']))->assertStatus(422);
    }

    /** @test **/
    public function data_in_email_field_is_unique()
    {
        $this->post('/api/user', array_merge($this->data(), ['email' => 'user@gmail.com']))->assertStatus(422);
    }    

    private function data()
    {
        return [
            'full_name' => 'Sample Name',
            'address' => 'Sample Address',
            'email' => 'sample@sample.com',
            'password' => bcrypt('password123'),
        ];
    }    
}
