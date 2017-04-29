<?php

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
        $user = factory(\App\User::class)->create(['name'=> 'Iago Effting', 'email' => 'iago.effting@gmail.com']);
        factory(\App\Article::class, 10)->create(['user_id' => $user->id]);
    }
}
