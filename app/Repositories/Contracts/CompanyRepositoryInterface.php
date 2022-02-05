<?php

namespace App\Repositories\Contracts;

interface CompanyRepositoryInterface
{
    public function get();
    public function getTotalSearch($term);
    public function search($term);
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function delete($ids);
}
