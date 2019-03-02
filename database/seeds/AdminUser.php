<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Profile;
class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =Role::create([
            'name'=>'customer',
            'description'=>'Customer role',
        ]);
       $role = Role::create([
           'name'=>'admin',
           'description'=>'Admin role',
        ]);

        $user = User::create([
           'email'=>'admin@admin.com',
            'password'=>bcrypt('secert'),
            'role_id'=>$role->id,
        ]);

        $profile = Profile::create([
           'user_id'=>$user->id,
        ]);


    }
}
