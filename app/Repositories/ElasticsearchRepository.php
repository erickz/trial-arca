<?php

namespace App\Repositories;

use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class ElasticSearchRepository extends CompanyRepository
{
    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct(Client $elasticsearch, Company $company)
    {
        $this->elasticsearch = $elasticsearch;
        $this->model = $company;
    }

    public function search($query = ''): LengthAwarePaginator
    {
        $items = $this->searchOnElasticsearch($query);
        $this->totalResults = $items['hits']['total']['value'];

        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch($query = ''): array
    {
        $model = new Company;

        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['name^5', 'address', 'city'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);

        return $items;
    }

    private function buildCollection($items): LengthAwarePaginator
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return Company::whereIn('id', $ids)->paginate($this->rowsPerPage);
    }
}
