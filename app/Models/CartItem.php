<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Define the table name (optional, if it's not plural)
    protected $table = 'cart_items';

    // Define the fillable attributes (fields that can be mass-assigned)
    protected $fillable = [
        'product_id', // the product in the cart
        'product_variant', // quantity of the product
        'price', // price of the product at the time of adding to the cart
        'delivery_type', 'delivery_slot','delivery_date','pincode','country'// total price (quantity * price)
    ];

    // Define the relationships (optional)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Add any additional functionality you need, like calculating total price, etc.
    public function calculateTotalPrice()
    {
        return $this->quantity * $this->price;
    }
}
