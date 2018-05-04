<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call(CompetitionsTableSeeder::class);
        $this->call(FAQsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
    }
}