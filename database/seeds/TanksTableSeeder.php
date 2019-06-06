<?php

use Illuminate\Database\Seeder;

class TanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tank::class, 20)
            ->create();
    }
}
