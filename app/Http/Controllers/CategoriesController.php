<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel){
        $this->categoryModel = $categoryModel;
    }

    public function index(){
        $categories = $this->categoryModel->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function view($id){
        $categories = $this->categoryModel->all();

        $products = Product::productsByCategory($id)->get();
        $category = $this->categoryModel->find($id);

        return view('categories.view', compact('categories','products', 'category'));

    }

}
