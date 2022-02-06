<?php

namespace App\Repositories\Contracts;

interface CompanyRepositoryInterface
{
    public function get();
    public function getTotal($term);
    public function search($query);
    public function searchBySlug($term);
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function syncCategories($row, $categories);
    public function delete($ids);
}
