<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryOption;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment
    protected $fillable = ['name', 'price', 'image'];

public function deliveryOptions()
{
    return $this->hasMany(DeliveryOption::class);
}
public function reviews()
{
    return $this->hasMany(Review::class);
}
}
