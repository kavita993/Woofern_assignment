<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_variant' => 'required|string',
            'price' => 'required|numeric',
            'delivery_type' => 'required|string',
            'delivery_slot' => 'required|string',
            'pincode' => 'required|string|max:6',
            'country' => 'required|string',
        ]);

        try {
            // Create cart item
            CartItem::create([
                'product_id' => $request->product_id,
                'product_variant' => $request->product_variant,
                'price' => $request->price,
                'delivery_type' => $request->delivery_type,
                'delivery_slot' => $request->delivery_slot,
                'delivery_date' => $request->delivery_date,
                'pincode' => $request->pincode,
                'country' => $request->country,
            ]);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
            ]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart. ' . $e->getMessage(),
            ]);
        }
    }
}
