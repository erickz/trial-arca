<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Category;

class CompaniesSeederTable extends Seeder
{
    public $arCategories;

    public function __construct(){
        $this->arCategories = Category::pluck('id')->toArray();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(20)->create()->each(function($company){
            $this->syncCompanyCategories($company);
        });
    }

    /**
     * Set to sync two categories by each company but It's worth mentioning sometimes the 
     * random generated numbers might be the same - in which in this case only one category will be synced to the company.
     * 
     * @param Company
     * @return Array
     */
    public function syncCompanyCategories($company)
    {
        return $company->categories()->sync([
            $this->arCategories[$this->selectRandomIndex()],
            $this->arCategories[$this->selectRandomIndex()]
        ]);
    }

    /**
     * This is used in order to select an id from the list of stored categories, providing a automatically way to
     * sync the newly created companies to existing categories
     * 
     * @return int
     */
    private function selectRandomIndex()
    {
        return rand(0, count($this->arCategories)-1); 
    }
}
