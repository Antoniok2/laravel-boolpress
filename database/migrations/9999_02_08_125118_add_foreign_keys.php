<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table ->foreign('category_id', 'posts_category') -> references('id') -> on('categories');
        });

        Schema::table('post_reaction', function (Blueprint $table) {

            $table ->foreign('post_id', 'posts_reactions') -> references('id') -> on('posts');
            $table ->foreign('reaction_id', 'reactions_posts') -> references('id') -> on('reactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table -> dropForeign('posts_category');
        });

        Schema::table('post_reaction', function (Blueprint $table) {

            $table ->dropForeign('posts_reactions');
            $table ->dropForeign('reactions_posts');
        });
    }
}