<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('username', 64)->unique();
			$table->string('password', 64);
			$table->string('email', 255)->unique();
			$table->string('name', 64);
			$table->string('lastname', 64);
			$table->date('birthday', 64);
			$table->int('role_id', 10);
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
		Schema::table('users', function(Blueprint $table)
		{
			Schema::dropIfExists("users");
		});
	}

}
