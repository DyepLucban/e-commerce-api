<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProductRepository implements ProductRepositoryInterface
{

    public function browse()
    {
        try {
            
            $products = Product::all();

            return response()->json($products, 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function read($id)
    {
        
    }

    public function edit($id, $request)
    {
        try {
            
            $product = Product::where('id', $id)->first();

            if ($product)
            {
                $product->product_name = $request['product_name'];
                $product->product_price = $request['product_price'];
                $product->product_desc = $request['product_desc'];
                $product->save();

                return response()->json(['message' => 'Product Successfully Updated!'], 200);
            }

            return response()->json(['message' => 'Product Not Found!'], 404);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function add($request)
    {
        try {
            
            $products = Product::create([
                'product_name' => $request['prod_name'],
                'product_price' => $request['prod_price'],
                'product_desc' => $request['description'],
            ]);

            return response()->json('Product successfully added!', 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }        
    }

    public function delete($id)
    {
        try {

            $product = Product::where('id', $id)->first();

            if($product)
            {
                $product->delete();
                
                return response()->json('Product Successfully Deleted!', 200);

            }

            return response()->json('Product not found!', 404);
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }            

}