<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Thomas N',
            'email' => 'thomas.n@compfest.id',
            'phoneNumber' => ' 08123456789',
            'password' => bcrypt('Admin123'),
            'is_admin' => '1'
        ]);

        $this->call(RatingsTableSeeder::class);
    }
}
