<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
     public function run()
    {
        DB::table('category')->insert([
            [
            'id'=>'1',
            'typename'=>'laravel',
            'parent_id'=>'0',
            'userid'=>'1',
            'seo_title'=>'',
            'seo_key'=>'',
            'seo_desc'=>''],
            [
            'id'=>'2',
            'typename'=>'php',
            'parent_id'=>'0',
            'userid'=>'2',
            'seo_title'=>'',
            'seo_key'=>'',
            'seo_desc'=>''],
            [
            'id'=>'3',
            'typename'=>'node.js',
            'parent_id'=>'0',
            'userid'=>'1',
            'seo_title'=>'',
            'seo_key'=>'',
            'seo_desc'=>'']
            
            ]);
    }
}
