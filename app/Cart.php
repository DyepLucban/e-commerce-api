<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'cart';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'quantity',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
