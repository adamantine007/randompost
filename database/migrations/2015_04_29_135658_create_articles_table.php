<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id')->unsigned();

			$table->integer('book_id')->unsigned();

			$table->text('body');

			$table->timestamps();

			$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
		});

//		DB::statement('ALTER TABLE articles ADD FULLTEXT search(body)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::table('articles', function($table) {
//			$table->dropIndex('search');
//		});

		Schema::drop('articles');
	}

}
