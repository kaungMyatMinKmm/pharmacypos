<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole= Role::where('name', 'admin')->first();
        $storeRole= Role::where('name', 'store')->first();

        $admin = User::create([
        	'name'=>'admin',
        	'email'=>'admin@goodhealth.com',
        	'password'=>Hash::make('admin@123')
        ]);

        $store = User::create([
        	'name'=>'store',
        	'email'=>'store@goodhealth.com',
        	'password'=>Hash::make('store@123')
        ]);

        $admin->roles()->attach($adminRole);
        $store->roles()->attach($storeRole);

    }
}
