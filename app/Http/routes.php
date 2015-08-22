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
Route::get('/', function () {
    return view('welcome');
});

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
*/

Route::pattern('id','[0-9]+');
Route::group(['prefix' => 'admin/products'],  ['as' => 'produtos', function(){

        Route::get('listar', 'AdminProductsController@index');
        Route::get('novo','AdminProductsController@getNovo');
        Route::post('novo','AdminProductsController@postNovo');
        Route::get('editar/{id?}', function($id = "0"){
            if($id)
                return 'Editar Produto '.$id;

            return "Não é um ID válido";
        });
        Route::put('editar','AdminProductsController@putEditar' );

        Route::delete('deletar/{id?}', function($id = "0"){
            if($id)
                return 'Deletar Produto '.$id;

            return "Não é um ID válido";
        });

}]);

Route::group(['prefix' => 'admin/categories'],  ['as' => 'categorias', function(){

    Route::get('listar', 'CategoriesController@index');
    Route::get('nova','CategoriesController@getNova');
    Route::post('nova','CategoriesController@postNova');
    Route::get('editar/{id?}', function($id = "0"){
        if($id)
            return 'Editar Categoria '.$id;

        return "Não é um ID válido";
    });
    Route::put('editar','CategoriesController@putEditar' );

    Route::delete('deletar/{id?}', function($id = "0"){
        if($id)
            return 'Deletar Categoria '.$id;

        return "Não é um ID válido";
    });

}]);
//Route::get('categories','CategoriesController@index');
//Route::get('/', 'WelcomeController@index');
//Route::get('exemplo', 'WelcomeController@exemplo');
//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');
