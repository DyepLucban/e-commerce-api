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
        
    }

    public function add($request)
    {
        
    }

    public function delete($id)
    {
        
    }            

}