<?php

namespace Database\Seeders;

use App\Models\User;
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
         User::factory()->create([
             "name"=> "admin",
             "role"=> "Admin",
             "email"=> "admin@gmail.com",
             "password"=> "admin12345",
             "gender"=> "Male",
             "dob"=> "2020-01-01",
             'country'=> "Indonesia"
         ]);


         $this->call(ProductSeeder::class);
    }
}
