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
Route::get('/','StoreController@index');
Route::get('/home','StoreController@index');
Route::group(['prefix' => 'categories'], function(){
    Route::get('/',['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::get('view/{id}/category',['as' => 'categories.view', 'uses' => 'CategoriesController@view']);
});

Route::group(['prefix' => 'store'], function(){
    Route::get('/',['as' => 'store', 'uses' => 'StoreController@index']);
    Route::get('category/{id}',['as' => 'store.category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}',['as' => 'store.product', 'uses' => 'StoreController@product']);
    Route::get('tag/{id}',['as' => 'store.tag', 'uses' => 'StoreController@tag']);

});

Route::group(['prefix' => 'cart'], function(){
    Route::get('/',['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('add/{id}',['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('destroy/{id}',['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
    Route::get('update/{id}/{qtd}',['as' => 'cart.update', 'uses' => 'CartController@update']);
});

Route::group(['prefix' => 'checkout', 'middleware' => 'auth'], function(){
    Route::get('placeOrder',['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('placeReturn',['as' => 'checkout.placeReturn', 'uses' => 'CheckoutController@placeReturn']);
});

Route::group(['prefix' => 'account', 'middleware' => 'auth'], function(){
    Route::get('/',['as' => 'account', 'uses' => 'AccountController@index']);
    Route::get('orders',['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'authorization'], 'where' => ['id' => '[0-9]+']], function(){

    Route::group(['prefix' => 'categories'], function(){
        Route::get('/',['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);
        Route::post('/',['as' => 'categories.store', 'uses' =>'AdminCategoriesController@store']);
        Route::get('create',['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('{id}/destroy',['as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('{id}/edit',['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('{id}/update',['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);

    });

    Route::group(['prefix' => 'products'], function(){
        Route::get('/',['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::post('/',['as' => 'products.store', 'uses' =>'AdminProductsController@store']);
        Route::get('create',['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('{id}/destroy',['as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('{id}/edit',['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('{id}/update',['as' => 'products.update', 'uses' => 'AdminProductsController@update']);

        Route::group(['prefix' => 'images'], function(){
            Route::get('{id}/product',['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}/product',['as' => 'products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}/product',['as' => 'products.images.store', 'uses' =>'AdminProductsController@storeImage']);
            Route::get('destroy/{id}/product',['as' => 'products.images.destroy', 'uses' =>'AdminProductsController@destroyImage']);
        });

    });

    Route::group(['prefix' => 'orders'], function(){
        Route::get('/',['as' => 'orders', 'uses' => 'AdminOrdersController@index']);
        Route::get('{id}/edit',['as' => 'orders.edit', 'uses' => 'AdminOrdersController@edit']);
        Route::post('{id}/update',['as' => 'orders.update', 'uses' => 'AdminOrdersController@update']);
    });

});
Route::get('test', 'CheckoutController@test');
Route::get('evento', function(){
    \Illuminate\Support\Facades\Event::fire(new \CodeCommerce\Events\CheckoutEvent());
    event(new \CodeCommerce\Events\CheckoutEvent());
});

