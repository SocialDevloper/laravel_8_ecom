<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // get User Name
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // get Product Name
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
