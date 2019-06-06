<?php

use Illuminate\Database\Seeder;

class DispenserSalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\DispenserSale::class, 20)
            ->create();
    }
}
