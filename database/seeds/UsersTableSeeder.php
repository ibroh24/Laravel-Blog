<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
                    'name' => 'Ibrahim Hammed',
                    'email' => 'ibroh24@gmail.com',
                    'password' => bcrypt('password'),
                    'admin' => 1
                ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/postImages/avatar.png',
            'about' => 'A muslim and easy going guy',
            'facebook' => 'facebook.com/ibroh24',
            'youtube' => 'youtube.com',

        ]);
    }
}
