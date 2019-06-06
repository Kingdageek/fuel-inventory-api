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
        // $this->call(UsersTableSeeder::class);
        // $this->call(DispensersTableSeeder::class);
        // $this->call(DispenserSalesTableSeeder::class);
        $this->call(TanksTableSeeder::class);
    }
}
