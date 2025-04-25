<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KaspiProduct extends Model
{
    protected $fillable = ['product_url', 'author_price', 'last_checked_at'];
}
