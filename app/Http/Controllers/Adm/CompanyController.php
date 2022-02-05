<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\BaseController;
use App\Repositories\Contracts\CompanyRepositoryInterface;
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
    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->repo = $companyRepository;        
    }

    /**
     * Retrieve the view with the form to find the company
     * @return bool|\Illuminate\Auth\Access\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        dd("Ae");
    }
}
