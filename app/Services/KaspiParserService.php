<?php

namespace App\Services;

class KaspiParserService
{
    public function parseProduct(string $url): array
    {
        return [
            'author' => 'Example Author',
            'author_price' => 123456,
        ];
    }

    public function getSellers(string $url): array
    {
        return [
            ['name' => 'Competitor A', 'price' => 119999],
            ['name' => 'Competitor B', 'price' => 124000],
        ];
    }
}
