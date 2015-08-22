<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Routing\Controller as BaseController;

class AdminCategoriesController extends BaseController
{
    private $categories;

    public function __construct(Category $category){
        $this->categories = $category;
    }

    public function index(){
        $categories = $this->categories->all();
        return view('categories', compact('categories'));
    }

    public function getNova(){
        return 'Nova Categoria';
    }

    public function postNova(){
        return 'Nova Categoria';
    }

    public function getEditar($id){
        return 'Editar Categoria '.$id;
    }

    public function putEditar(){
        return 'Editar Categoria';
    }

    public function deleteDeletar($id){
        return 'Deletar Categoria '.$id;
    }
}
