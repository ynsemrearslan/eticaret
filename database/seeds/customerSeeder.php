<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i <4 ; $i++) {
          DB::table('customer')->insert([
            'name'=>$faker->name,
            'email'=>$faker->freeEmail,
            'phone'=>$faker->mobileNumber,
          ]);
        }
    }
}
