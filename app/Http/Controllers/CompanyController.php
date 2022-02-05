<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends BaseController
{
    private $repo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Retrieve the view with the form to find the company
     * @return bool|\Illuminate\Auth\Access\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'companies' => []
        ];

        return view('companies-search')->with($data);
    }
}
