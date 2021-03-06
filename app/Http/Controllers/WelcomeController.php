<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Routing\Controller as BaseController;

class WelcomeController extends BaseController
{
    private $categories;

    public function __construct(Category $category){
        $this->categories = $category;
    }

    public function index(){
        return view('welcome');
    }

    public function exemplo(){
        //$nome = 'Maico';
        // $sobrenome = 'Machado';
        //return view('exemplo',['nome' => $nome, 'sobrenome' => $sobrenome]);
        $categories = $this->categories->all();
        return view('exemplo', compact('categories'));
    }
}
