<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
//tipo de rota get ou post
Route::match(['get','post'], '/exemplo2',function() {
    return 'oi';
});
//qualquer tipo de rota padrão do php
Route:any('/exemplo2',function(){
    return 'oi';
});
<form action="#" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

Route::get('user/{id?}',function($id = "0"){
    if($id)
        return "Olá $id";

    return "Não possui ID";
})->where('id', '[0-9]+');

Route::pattern('id','[0-9]+');

Route::get('produtos-legais', ['as' => 'produtos', function(){
    return "Produtos";
}]);
echo route('produtos');die;
echo currentRouteName(); // tras a rota atual
//redirect->route('produtos');

Route::group(['prefix' => 'admin'], function(){

    Route::get('products', function(){
        return "Products";
    });

});
Route::group(['namespace' => 'App'], function(){

    Route::get('products', function(){
        return "Products";
    });

});
Route::get('category/{id}', function($id){
    $category = new \CodeCommerce\Category();

    $c = $category->find($id);
    return $c->name;
});
Route::get('category/{category}', function(\CodeCommerce\Category $category){
    return $category->name;
});


Route::pattern('id','[0-9]+');
Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'products'], function(){
        Route::get('listar',['as' => 'produtos', function(){
            return 'Lista de Produtos';
        }]);
        Route::match(['get','post'],'novo',['as' => 'produto-novo', function(){
            return 'Novo de Produto';
        }]);
        Route::match(['get','put'],'editar/{id?}', ['as' => 'produto-editar', function($id = "0"){
            if($id)
                return 'Editar Produto '.$id;

            return "Não é um ID válido";
        }]);
        Route::match(['get','delete'],'deletar/{id?}', ['as' => 'produto-deletar', function($id = "0"){
            if($id)
                return 'Deletar Produto '.$id;

            return "Não é um ID válido";
        }]);
    });
    Route::group(['prefix' => 'categories'], function(){
        Route::get('listar',['as' => 'categorias', function(){
            return 'Lista de Categorias';
        }]);
        Route::match(['get','post'],'nova',['as' => 'categoria-nova', function(){
            return 'Nova de Categoria';
        }]);
        Route::match(['get','put'],'editar/{id?}', ['as' => 'categoria-editar', function($id = "0"){
            if($id)
                return 'Editar Categoria '.$id;

            return "Não é um ID válido";
        }]);
        Route::delete('deletar/{id?}',['as' => 'categoria-deletar',function($id = "0"){
            if($id)
                return 'Deletar Categoria '.$id;

            return "Não é um ID válido";
        }]);
    });
});
//echo route('produto-deletar');die();
//Route::get('/', 'WelcomeController@index');
//Route::get('exemplo', 'WelcomeController@exemplo');
//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');
*/
Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id','[0-9]+');
Route::group(['prefix' => 'admin'], function(){

    Route::get('categories',['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::post('categories',['as' => 'categories.store', 'uses' =>'CategoriesController@store']);
    Route::get('categories/create',['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::get('categories/{id}/destroy',['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::get('categories/{id}/edit',['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::put('categories/{id}/update',['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

    Route::get('products',['as' => 'products', 'uses' => 'ProductsController@index']);
    Route::post('products',['as' => 'products.store', 'uses' =>'ProductsController@store']);
    Route::get('products/create',['as' => 'products.create', 'uses' => 'ProductsController@create']);
    Route::get('products/{id}/destroy',['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
    Route::get('products/{id}/edit',['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::put('products/{id}/update',['as' => 'products.update', 'uses' => 'ProductsController@update']);
});

