<?php

namespace App\Repositories\Interfaces;
use  App\Models\Product;
interface ProductRepositoryInterface
{
    public function index();
    public function store(array $data);



}
