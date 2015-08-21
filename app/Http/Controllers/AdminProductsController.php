<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Routing\Controller as BaseController;

class AdminProductsController extends BaseController
{
    private $products;

    public function __construct(Product $product){
        $this->products = $product;
    }

    public function index(){
        $products = $this->products->all();
        return view('products', compact('products'));
    }
}
