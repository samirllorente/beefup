<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_teacher = Role::where('name', 'teacher')->first();
        $role_student = Role::where('name', 'student')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Teacher';
        $user->email = 'teacher@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_teacher);

        $user = new User();
        $user->name = 'Student';
        $user->email = 'student@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_student);
        
    }
}
