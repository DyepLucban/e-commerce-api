<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
            	'product_name' => 'Product 1',
            	'product_price' => 200,
            	'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
            	'product_name' => 'Product 2',
				'product_price' => 500,
				'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
            	'product_name' => 'Product 3',
            	'product_price' => 1000,
            	'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
            	'product_name' => 'Product 4',
				'product_price' => 700,
				'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
            	'product_name' => 'Product 5',
            	'product_price' => 100,
            	'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
            	'product_name' => 'Product 6',
				'product_price' => 2500,
				'product_desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore expedita sint non recusandae ea in sit voluptatibus',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],                        
        ];

        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
