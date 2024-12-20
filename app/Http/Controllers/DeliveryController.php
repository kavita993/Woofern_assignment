<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeliveryController extends Controller
{
    public function checkPincode(Request $request)
{
    $pincode = $request->input('pincode');

    // Query the database for the entered pincode
    $pincodeData = DB::table('pincodes')->where('pincode', $pincode)->first();

    if ($pincodeData) {
        return response()->json([
            'success' => true,
            'message' => 'Pincode found',
            'available_today' => $pincodeData->available_today,
            'available_tomorrow' => $pincodeData->available_tomorrow,
            'custom_available' => $pincodeData->custom_available,
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Pincode not available',
        ]);
    }
}

}
