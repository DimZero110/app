<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class LoginController extends Controller
{
//    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function post_reg(Request $request){
        $post=$request->all();

        var_dump($post);

    }
}
