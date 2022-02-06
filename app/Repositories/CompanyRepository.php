<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{
    protected $model;
    protected $totalResults = null;
    protected $rowsPerPage = 10;

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
     * Retrieve the total number of records. It can filter by term.
     * @param String @term 
     * @return int
     */
    public function getTotal($term = null): int
    {
        if ($this->totalResults === NULL){
            $model = $this->model;

            if ($term){
                $model = $model->where('name', 'like', '%'. $term .'%');
            }

            $this->totalResults = $model->get()->count();
        }
        
        return $this->totalResults;
    }

    /**
     * 
     * @param String @query 
     * @return LengthAwarePaginator
     */
    public function search($query = ''): LengthAwarePaginator
    {
        return $this->model->where('name', 'like', '%'. $query .'%')->paginate($this->rowsPerPage);
    }

    /**
     * 
     * @param String @term 
     * @return Model
     */
    public function searchBySlug($slug = ''): Company
    {
        return $this->model->firstWhere('slug', $slug);
    }

    public function paginate(Array $filters = []): LengthAwarePaginator
    {
        return $this->model->paginate($this->rowsPerPage);
    }

    public function find($id = 0): Company
    {
        return $this->model->find($id);
    }

    public function store($data = []): Company
    {
        $row = $this->model->create($data);

        $this->syncCategories($row, $data['categories']);

        return $row;
    }

    public function update($id, $data): Bool
    {
        $row = $this->find($id);

        if (! $row){
            return false;
        }

        $updated = $row->update($data);

        $this->syncCategories($row, $data['categories']);

        return $updated;
    }

    public function syncCategories($row = null, $categories = null): Array
    {
        if( isset($categories) ){
            return $row->categories()->sync($categories);
        }

        return $row->categories()->sync([]);
    }

    public function delete($ids): Bool
    {
        return $this->model->destroy($ids);
    }
}
