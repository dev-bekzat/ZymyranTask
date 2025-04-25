<?php

namespace App\Events;

use App\Models\KaspiProduct;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProductPriceChanged
{
    use Dispatchable, SerializesModels;

    public function __construct(public KaspiProduct \$product, public array \$seller)
    {
        Log::info('Detected dumping price', [
            'product_id' => $product->id,
            'url' => $product->product_url,
            'competitor' => $seller['name'],
            'price' => $seller['price'],
        ]);
    }
}
