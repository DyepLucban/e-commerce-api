<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserRepositoryInterface
{

    public function browse()
    {

    }

    public function read($id)
    {
        
    }

    public function edit($id, $request)
    {
        
    }

    public function add($request)
    {
        try {

            User::create([
                'name' => $request['full_name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            return response()->json(['User Successfully Created!'], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        
    }            

}