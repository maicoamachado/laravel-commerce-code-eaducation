<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Http\Requests;
use CodeCommerce\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel){
        $this->productModel = $productModel;
    }

    public function index(){
        $products = $this->productModel->paginate(10);
        return view('products.index', compact('products'));
    }

}
