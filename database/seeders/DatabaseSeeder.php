<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Faizal Fahmi Aziz',
            'username' => 'faizaziz24',
            'email' => 'faizaziz24@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\User::factory(100)->hasStatuses(5)->create();

        // \App\Models\User::factory(10)->create();
        // \App\Models\Status::factory(10)->create();
    }
}
