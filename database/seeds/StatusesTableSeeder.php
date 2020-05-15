<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Statuses = factory(Status::class)->times(1000)->make();
        Status::insert($Statuses->toArray());
    }
}
