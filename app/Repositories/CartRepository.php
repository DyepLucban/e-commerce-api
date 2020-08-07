<?php

namespace App\Repositories;

use App\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CartRepository implements CartRepositoryInterface
{

    public function browse()
    {
        try {
            
            $cart = Cart::where('user_id', Auth::id())->with('product')->get();

            if(count($cart))
            {
                foreach ($cart as $key => $value) {
                    $data[] = $value->product;
                    $data[$key]['quantity'] = $value->quantity;
                    $data[$key]['cart_id'] = $value->id;
                }
    
                return response()->json($data, 200);
            }
            
            return response()->json($cart, 200);

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
        $data = Cart::where([
            ['product_id', $request['product_id']],
            ['user_id', $request['user_id']]
        ])->get();

        if (!$data->count()) {
            Cart::create([
                'user_id' => $request['user_id'],
                'product_id' => $request['product_id'],
                'quantity' => $request['qty'],
            ]);                     
        } else {
            $cart = Cart::where('product_id', $request['product_id'])->first();

            $cart->quantity = $cart->quantity + 1;
            $cart->save();
        }

        return response()->json(['message' => 'Added to cart!'], 200);
    }

    public function delete($id)
    {
        try {
            
            $cart = Cart::where('id', $id)->first();

            if ($cart) {

                $cart->delete();

                return response()->json(['message' => 'Item Successfully Removed!'], 200);
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }            

}