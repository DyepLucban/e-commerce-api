<?php

namespace App\Repositories;

use App\Cart;
use App\Order;
use App\User;
use App\Mail\OrderMail;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderRepository implements OrderRepositoryInterface
{

    public function browse()
    {
        try {

            $orders = Order::where('user_id', Auth()->id())->get();

            if ($orders)
            {
                return response()->json(json_decode($orders));
            } else {
                return response()->json();
            }

        } catch (\Exception $e) {
            return $e->getMessage();            
        }
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

            $user = User::where('id', $request['user_id'])->first();

            Order::create([
                'user_id' => $request['user_id'],
                'ordered_item' => $request['item'],
                'total' => $request['total'],
                'mop' => $request['mop'],
            ]);

            Cart::where('user_id', $request['user_id'])->delete();

            \Mail::to($user->email)->send(new OrderMail());

            return response()->json(['Order Successfully Made!'], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        
    }            

}