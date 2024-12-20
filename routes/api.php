<?php

use App\Http\Controllers\DeliveryController;

Route::get('/slots', [DeliveryController::class, 'getSlots']);
Route::post('/pricing', [DeliveryController::class, 'calculatePricing']);
?>
