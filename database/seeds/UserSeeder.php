<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'admin1',
            'email'=>'admin1@gmail.com',
            'password'=>Hash::make('antk')
        ];
        DB::table('tbl_users')->insert($data);
    }
}
