<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    public function index(){
        $categories = Category::all();
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id){
        $categories = Category::all();

        $products = Product::ofCategory($id)->get();
        $category = Category::find($id);

        return view('store.category', compact('categories','products', 'category'));

    }

    public function product($id){
        $categories = Category::all();
        $product = Product::find($id);
        $tags = $product->tags()->get();

        //dd($tags);
        return view('store.product', compact('categories','product', 'tags'));
    }

    public function tag($id){
        $categories = Category::all();
        $tag = Tag::find($id);
        $products = Tag::find($id)->products()->get();

        return view('store.tag', compact('categories','products', 'tag'));

    }
}
