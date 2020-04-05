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

         $this->call(productSeeder::class);
         $this->call(categoriesSeeder::class);
         $this->call(adminusersSeeder::class);
         $this->call(customerSeeder::class);
         $this->call(addressSeeder::class);

    }
}
