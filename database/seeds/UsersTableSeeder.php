<?php
/**
 * database/seeds/UsersTableSeeder.php
 * seeds Users
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'abder',
                'email' => 'abguermit@gmail.com',
                'password' => Hash::make('abder'),
                'remember_token' => sha1(uniqid(rand()))
            ]);
    }
}
