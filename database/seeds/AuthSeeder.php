<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use ProgrammingBlog\User;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = new User();
        $adminUser->name = config('auth.adminUser.name');
        $adminUser->email = config('auth.adminUser.email');
        $adminUser->password = Hash::make(config('auth.adminUser.password'));
        $adminUser->save();
    }
}
