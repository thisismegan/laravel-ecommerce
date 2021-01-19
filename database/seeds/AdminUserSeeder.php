<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Stayctn',
            'email' => 'admin@stayctn',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('admin');
        return $user;
    }
}
