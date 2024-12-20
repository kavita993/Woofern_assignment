<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DeliveryOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('delivery_options')->insert([
            ['option' => 'Same Day Delivery', 'price' => 99.00],
            ['option' => 'Tomorrow Delivery', 'price' => 199.00],
            ['option' => 'Scheduled Delivery', 'price' => 250.00],
        ]);
    }
}
// database/seeders/DeliveryOptionsSeeder.php


