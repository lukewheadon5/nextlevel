<?php

use Illuminate\Database\Seeder;
use App\Team;


class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Team;
        $k->name = "Team 1";
        $k->save();
        $k->users()->attach(1);
        $k->users()->attach(2);
        $k->users()->attach(5);

        $k = new Team;
        $k->name = "Team 2";
        $k->save();
        $k->users()->attach(1);
        $k->users()->attach(3);

        $k = new Team;
        $k->name = "Team 3";
        $k->save();
        $k->users()->attach(2);
        $k->users()->attach(5);

        $k = new Team;
        $k->name = "Team 2";
        $k->save();
        $k->users()->attach(4);
        $k->users()->attach(1);
    }
}
