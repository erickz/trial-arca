<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeederTable::class);
        $this->call(CompaniesSeederTable::class);
        $this->call(UserToLoginSeederTable::class);
        //TODO: Seeder to link categories and companies
    }
}
