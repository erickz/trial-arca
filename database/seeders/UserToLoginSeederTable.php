<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Str;

class UserToLoginSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::insert([
            'name'  => 'admin'
            ,'email' => 'user@test.com'
            ,'email_verified_at' => now()
            ,'password' => bcrypt('usertest@123')
            ,'remember_token' => Str::random(10)
            ,'created_at' => now()
            ,'updated_at' => now()
        ]);
    }
}
