<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('aid');//文章id
            $table->integer('typeid');//栏目id
            $table->string('author');
            $table->string('title');
            $table->text('content');
            $table->string('tags')->nullable();//标签
            $table->string('type')->default(0);//文章类型
            $table->string('keyword');//关键字
            $table->string('desc');//简述
            $table->integer('click_number')->default(0);//点击次数
            $table->boolean('is_discuss')->default(0);//是否评论
            $table->integer('userid')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
