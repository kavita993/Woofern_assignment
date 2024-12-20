<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create multiple product records
        Product::create([
            'name' => 'Blue Beauty Flower Box',
            'price' => 1695.00,
            'image' => 'https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg'
        ]);

        Product::create([
            'name' => 'Blue Beauty Flower Box1',
            'price' => 1795.00,
            'image' => 'https://cdn.igp.com/f_auto,q_auto,t_pnopt12prodlp/products/p-blue-beauty-flower-box-139964-m.jpg'
        ]);

      
    }
}
