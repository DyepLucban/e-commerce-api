<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository implements AuthRepositoryInterface
{

    public function login($request)
    {
        try {

            $user = User::where('email', $request['email'])->first();

            if ($user) {

                if($user->role != 1)
                {
                    if (!$user || !Hash::check($request['password'], $user->password))
                    {
                        return response()->json(['message' => 'Invalid Credentials'], 401);
                    }
                    
                    return $user->createToken($request['device_name'])->plainTextToken;

                } else {

                    if (!$user || !Hash::check($request['password'], $user->password))
                    {
                        return response()->json(['message' => 'Invalid Credentials'], 401);
                    }
                    
                    return response()->json([
                        'token' => $user->createToken($request['device_name'])->plainTextToken,
                        'auth' => true
                    ], 200);
                }
            }

            return response()->json(['Not a registered account'], 401);


        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function getAuthUser()
    {
        try {

            $user = Auth::user();

            return response()->json($user, 200); 

        } catch (\Exception $e) {
            return $e->getMessage();
        }    
    }


}