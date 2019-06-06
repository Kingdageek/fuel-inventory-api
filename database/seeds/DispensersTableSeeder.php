<?php

use Illuminate\Database\Seeder;

class DispensersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Dispenser::class, 20)
            ->create();
    }
}
