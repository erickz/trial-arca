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
    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Attempt to login
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('adm.companies.index');
        }

        return back()->withInput($request->except("password"))->withErrors(['authentication' => 'Your email or password are wrong, please try again.']);
    }

    /**
     * 
     */
    public function doLogout(Request $request)
    {
        auth()->logout();

        return redirect(route('login.index'));
    }
}
