<?php

namespace App\Http\Controllers;

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
        $termSearched = $request->input('q');

        $data = [
            'companies'    => [],
            'termSearched' => $termSearched,
            'totalSearch'  => 0
        ];
        
        if ($request->has('q') && !empty($termSearched)){
            $data['companies'] = $this->repo->search($termSearched);
            $data['totalSearch'] = $this->repo->getTotal($termSearched);
        }

        return view('companies.search')->with($data);
    }


    /**
     * Retrieve the view with the company`s details
     * @return bool|\Illuminate\Auth\Access\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function details($companyName)
    {
        $data = [
            'company'    => null
        ];
        
        if (! empty($companyName)){
            $data['company'] = $this->repo->searchBySlug($companyName);
        }

        return view('companies.details')->with($data);
    }
}
