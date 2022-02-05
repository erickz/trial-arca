<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Http\Request;
use Validator;

class LoginController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          
    }

    public function index()
    {
        $data = [

        ];

        return view('login')->with($data);
    }

    /**
     * 
     */
    public function doLogin()
    {
        $data = [
            
        ];

        return view('login')->with($data);
    }
}
