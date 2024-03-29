<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'account_type' => 'Administrator',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'ezemapromise@yahoo.com',
            'user_name' => 'admin-admin',
            'email_verified_at' => now(),
            'password' => bcrypt('Password1'),
            'status' => 'Approved',
            'approved_at' => now(),
        ]);
    }
}
