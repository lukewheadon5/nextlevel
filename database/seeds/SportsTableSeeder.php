<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new Sport;
        $s->name = "American Football";
        $s->save();

        $s = new Sport;
        $s->name = "Football";
        $s->save();

        $s = new Sport;
        $s->name = "Rugby";
        $s->save();

        $s = new Sport;
        $s->name = "Hockey";
        $s->save();

        $s = new Sport;
        $s->name = "Netball";
        $s->save();



    }
}
