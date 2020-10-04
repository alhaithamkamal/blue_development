<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'haitham',
            'email' => 'haitham@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
            'email_verified_at' => now(),
            ]);
    }
}
