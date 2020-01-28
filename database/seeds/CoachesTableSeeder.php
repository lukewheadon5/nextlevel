<?php

use Illuminate\Database\Seeder;


class CoachesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Coach::class, 10)->create();
    }
}
