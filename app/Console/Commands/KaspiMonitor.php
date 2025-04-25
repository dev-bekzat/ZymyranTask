<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KaspiProduct;
use App\Services\KaspiParserService;
use App\Events\ProductPriceChanged;

class KaspiMonitor extends Command
{
    protected $signature = 'kaspi:monitor';
    protected $description = 'Мониторинг цен на Kaspi.kz';

    public function handle(KaspiParserService $parser)
    {
        foreach (KaspiProduct::all() as $product) {
            sleep(2);
            $sellers = $parser->getSellers($product->product_url);
            foreach ($sellers as $seller) {
                if ($seller['price'] < $product->author_price) {
                    event(new ProductPriceChanged($product, $seller));
                    break;
                }
            }

            $product->update(['last_checked_at' => now()]);
        }
    }
}
