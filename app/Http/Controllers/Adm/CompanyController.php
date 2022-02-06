<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\BaseController;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreUpdateCompanyRequest;

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
            'companies'    => $this->repo->paginate(),
            'total'        => $this->repo->getTotal()
        ];

        return view('adm.companies-index')->with($data);
    }

    public function create()
    {
        return view('adm.companies-create')->with(['categories' => Category::get()]);
    }

    public function store(StoreUpdateCompanyRequest $request)
    {
        $company = $this->repo->store($request->except('csrf'));

        return redirect()->route('adm.companies.edit', [$company->id])->with(['message' => 'New company stored with success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        $company = $this->repo->find($id);

        return view('adm.companies-edit')->with(['company' => $company, 'categories' => Category::get()]);
    }

    public function update(StoreUpdateCompanyRequest $request, $id)
    {
        if (! $request->validated()){
            return back()->withErrors();
        }

        $company = $this->repo->update($id, $request->all());

        return redirect()->route('adm.companies.edit', [$id])->with(['message' => 'Company updated with success!', 'type' => 'success']);
    }

    public function delete($id)
    {
        if ($id){
            $deleted = $this->repo->delete([$id]);

            if (! $deleted){
                return redirect()->route('adm.companies.index')->with(['message' => 'Coudn`t delete the record', 'type' => 'danger']);
            }
        }

        return redirect()->route('adm.companies.index')->with(['message' => 'Record deleted with success', 'type' => 'success']);
    }
}