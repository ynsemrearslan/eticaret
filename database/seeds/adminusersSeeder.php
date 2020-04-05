<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class adminusersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin-users')->insert([
          'name'=>'Yunus Emre',
          'email'=>'yunusemrearslann@outlook.com',
          'role'=>1,
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
    }
}
