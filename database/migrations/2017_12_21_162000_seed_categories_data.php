<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => '玩蛇之路',
                'description' => 'Python学习记录'
            ],
            [
                'name' => 'Laravel踩坑',
                'description' => 'Laravel踩坑记录'
            ],
            [
                'name' => 'Vue探索',
                'description' => 'Vue探索记录'
            ]
        ];
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
