<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AttentionTableSeeder extends Seeder
{
     public function run()
    {
        DB::table('attention')->insert([
            ['user1_id'=>'1','user2_id'=>'2'],
            ['user1_id'=>'1','user2_id'=>'3'],
            ['user1_id'=>'1','user2_id'=>'4'],
            ['user1_id'=>'2','user2_id'=>'3'],
            ['user1_id'=>'2','user2_id'=>'4'],
            ['user1_id'=>'2','user2_id'=>'1'],
            ['user1_id'=>'3','user2_id'=>'1'],
            ['user1_id'=>'4','user2_id'=>'1']
            ]);
    }
}
