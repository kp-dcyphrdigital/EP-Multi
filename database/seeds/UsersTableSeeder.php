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
        // Super Admin with access to all competitions
		factory(App\User::class)->create([
            'name' => 'Admin',
            'type' => 'SUPERADMIN',
            'email' => 'admin@syginteractive.com.au',
            'password' => Hash::make('Password123'),
        ])->each(function ($u) {
            $u->competitions()->attach(
                App\Competition::all()
            );
        });;

        // Users with access to one of the competitions at random
		factory(App\User::class, 3)->create([
            'type' => 'ADMIN',
        ])->each(function ($u) {
        	$u->competitions()->attach(
        		App\Competition::inRandomOrder()->first()
        	);
    	});
    }
}
