<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{
    private $model;
    private $rowsPerPage = 10;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    /**
     * 
     * @param Array @filters 
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->model->get();
    }

    /**
     * Retrieve the total number of records of a search 
     * @param String @term 
     * @return int
     */
    public function getTotalSearch($term = ''): int
    {
        return $this->model->where('name', 'like', '%'. $term .'%')->get()->count();
    }

    /**
     * 
     * @param String @term 
     * @return LengthAwarePaginator
     */
    public function search($term = ''): LengthAwarePaginator
    {
        return $this->model->where('name', 'like', '%'. $term .'%')->paginate($this->rowsPerPage);
    }

    /**
     * 
     * @param String @term 
     * @return Company
     */
    public function searchBySlug($slug = ''): Company
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function paginate(Array $filters = []): LengthAwarePaginator
    {
        return $this->model->paginate($this->rowsPerPage);
    }

    public function find($id = 0): Model
    {
        return $this->model->find($id);
    }

    public function store($data = []): Model
    {
        $row = $this->model->create($data);

        return $row;
    }

    public function update($id, $data): Bool
    {
        $row = $this->find($id);

        if (! $row){
            return false;
        }

        $updated = $row->update($data);

        return $updated;
    }

    public function delete($ids): Bool
    {
        return $this->model->destroy($ids);
    }
}
