<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i <5; $i++) {
          DB::table('product')->insert([
            'name'=>$faker->title(15),
            'category_id'=>rand(1,7),
            'price'=>rand(20,100),
            'stock'=>rand(20,100),
            'photo'=>$faker->imageUrl(800,400,'cats'),
            'created_at'=>now(),
            'updated_at'=>now(),
          ]);
        }
    }
}
