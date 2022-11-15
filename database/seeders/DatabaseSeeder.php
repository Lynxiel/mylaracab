<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(4)->create();
//         \App\Models\CableGroup::factory(5)->create();
//         \App\Models\Cable::factory(30)->create();

         User::factory()->create([
             'name' => 'Admin',
             'email' => 'postmaster@kabelopt71.ru',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
             'remember_token' => Str::random(10),
             'phone' => Str::random(10),
             'is_admin' => true,
         ]);


    }


}
