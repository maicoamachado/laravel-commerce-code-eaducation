<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class WelcomeController extends BaseController
{
    public function index(){
        return view('welcome');
    }

    public function exemplo(){
        $nome = 'Maico';
        $sobrenome = 'Machado';
        return view('exemplo',['nome' => $nome, 'sobrenome' => $sobrenome]);
    }
}
