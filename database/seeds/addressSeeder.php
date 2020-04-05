<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class addressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $types=['Ev','İş_Yeri','Kampüs','Şube_Teslimatı'];
        $faker=Faker::create();
        for ($i=0; $i <4 ; $i++) {
          DB::table('address')->insert([
            'customer_id'=>rand(1,4),
            'type'=>'ev',
            'name'=>$faker->name,
            'address'=>$faker->building,
            'city'=>$faker->city,
            'tc_no'=>$faker->individualIdentificationNumber,
            'phone'=>$faker->mobileNumber,
            'created_at'=>now(),
            'updated_at'=>now()
          ]);
        }
    }
}
