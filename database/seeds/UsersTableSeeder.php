<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'nitesh.shresthax@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Nitesh Shrestha',
                'email' => 'nitesh.shresthax@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]);
        }
    }
}
