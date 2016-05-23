<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Owner',
            'username' => 'owner',
            'email'    => 'spam.szsw@gmail.com',
            'password' => Hash::make('awesome'),
        ));
    }

}