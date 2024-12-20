<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model
{
    use HasFactory;

    // Allow mass assignment
    protected $fillable = ['option', 'price','available_today','available_tomorrow','custom_available'];

}
