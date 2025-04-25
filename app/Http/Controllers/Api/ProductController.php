<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KaspiProduct;
use App\Services\KaspiParserService;

class ProductController extends Controller
{
    public function index()
    {
        return KaspiProduct::all();
    }

    public function store(Request $request, KaspiParserService $parser)
    {
        $request->validate([
            'product_url' => 'required|url|unique:kaspi_products,product_url',
        ]);

        $parsed = $parser->parseProduct($request->product_url);

        $product = KaspiProduct::create([
            'product_url' => $request->product_url,
            'author_price' => $parsed['author_price'],
        ]);

        return response()->json($product, 201);
    }
}
