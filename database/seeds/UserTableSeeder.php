<?php

use Illuminate\Database\Seeder;
use App\User;
use Bican\Roles\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'jtipsy',
            'email' => 'jtipsy@163.com',
            'password' => bcrypt('madio123')
        ]);

/*         $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123456')
        ]); */

        $adminRole = Role::where('slug', '=', 'admin')->first();
        //$userRole = Role::where('slug', '=', 'user')->first();

        $admin->attachRole($adminRole);
        //$user->attachRole($userRole);
    }
}
