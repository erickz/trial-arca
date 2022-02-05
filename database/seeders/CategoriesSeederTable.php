<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeederTable extends Seeder
{
    public $defaultCategories = [];

    public function __construct()
    {
        $this->setDefaultCategories();
    }

    public function setDefaultCategories()
    {
        return $this->defaultCategories = [
            'Auto', 'Beauty and Fitness', 'Entertainment', 'Food and Dining', 'Health', 'Sports', 'Travel'
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;

        foreach($this->defaultCategories as $category){
            $newCategory = Category::create(['name' => $category]);
            $newCategory ? $count++ : $count;
        }

        $this->command->info($count . ' categories successfully created!');
    }
}
