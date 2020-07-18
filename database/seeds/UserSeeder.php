<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Anonymous',
            'email' => 'anonymous@example.com',
            'password' => bcrypt(env('ANON_PASSWORD')),
        ])->save();

        factory(App\User::class)->create([
            'name' => 'Havens',
            'email' => 'me@hvs.cx',
        ])->save();

        factory(App\User::class, 3)->create();
    }
}
