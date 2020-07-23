<?php

namespace App\Repositories;

use App\Order;
use App\Cart;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderRepository implements OrderRepositoryInterface
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

            Order::create([
                'user_id' => $request['user_id'],
                'ordered_item' => $request['item'],
                'total' => $request['total'],
                'mop' => $request['mop'],
            ]);

            Cart::where('user_id', $request['user_id'])->delete();

            return response()->json(['Order Successfully Made!'], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        
    }            

}