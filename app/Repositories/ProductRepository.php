<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{


    public function index()
    {
        return Product::latest()->paginate(5);
    }

    public function store(array $data)
    {

        Product::create($data);
    }





}
