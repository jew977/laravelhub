<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admin','email'=>'jew977@qq.com','password'=>Hash::make('123456'),'isadmin'=>'1'],
            ['name'=>'jew','email'=>'977520990@qq.com','password'=>Hash::make('123456'),'isadmin'=>'0'],
            ['name'=>'jew01','email'=>'9775209901@qq.com','password'=>Hash::make('123456'),'isadmin'=>'0'],
            ['name'=>'jew02','email'=>'9775209902@qq.com','password'=>Hash::make('123456'),'isadmin'=>'0']
        ]);
    }
}
