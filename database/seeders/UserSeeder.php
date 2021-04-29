<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hector',
            'email' => 'hector@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole(1);
        User::create([
            'name' => 'director',
            'email' => 'director@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole(2);
        User::create([
            'name' => 'subdirector',
            'email' => 'sub@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole(3);
        User::create([
            'name' => 'jud',
            'email' => 'jud@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole(4);
    }
}
