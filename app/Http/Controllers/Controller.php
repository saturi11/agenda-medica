<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        $variavel = "homepage do siiiiis";
        return view('welcome',['title' => $variavel]);
    }
    public function cadastrar(){
        echo "cadastro";
    }
/*
|--------------------------------------------------------------------------
| login view
|--------------------------------------------------------------------------
*/
    public function login(){
       return view('user.login');
}
}