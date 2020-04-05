<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();
      $categories=['Giyim','Oyuncak','Teknoloji','Spor','Outdoor','Kampanya','Aksesuar'];
      foreach ($categories as $category) {
        DB::table('categories')->insert([
          'name'=>$category,
          'description'=>$faker->text(7),
          'photo'=>$faker->imageUrl(800,400,'cats'),
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
    }
}
