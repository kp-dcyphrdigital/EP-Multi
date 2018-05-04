<?php

use Illuminate\Database\Seeder;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory('App\FAQ', 20)->create();
    }
}
