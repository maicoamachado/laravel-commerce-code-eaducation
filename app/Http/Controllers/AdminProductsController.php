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

    public function getNovo(){
        return 'Novo Produto';
    }

    public function postNovo(){
        return 'Novo Produto';
    }

    public function getEditar($id){
        return 'Editar Produto '.$id;
    }

    public function putEditar(){
        return 'Editar Produto';
    }

    public function deletar(){
        return 'Deletar Produto';
    }
}
