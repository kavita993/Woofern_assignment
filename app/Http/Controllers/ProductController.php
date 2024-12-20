<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

use App\Models\DeliveryOption;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('name',$id)->with('reviews')->withCount('reviews')->first();
        $cart_count=CartItem::count();
        $deliveryOptions = DeliveryOption::all();
        return view('product.show', compact('product', 'deliveryOptions','cart_count'));
    }

}


