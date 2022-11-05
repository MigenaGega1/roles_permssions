<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;

    }


    public function update(Request $request, Product $product)
    {
        Product::where('id', '=', $product->id)
            ->update([
                'name' => $request->name,
                'detail' => $request->detail,
                'updated_at' => Carbon::now()->toDateTimeString(),

            ]);

    }
}
