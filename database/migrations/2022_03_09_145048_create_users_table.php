<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			//usuario
            $table->increments('id');
			$table->string('cpf',11) ->unique();
			$table->string('name',50);
			$table->char('phone',11);
			$table->date('birth')->nullable();
			
			//login
			$table->string('email',80) ->unique();
			$table->string('password',245) ->nullable();
			

			//permição
			$table->string('status') ->default('active');
			$table->string('permission') ->default('app.user');

			$table->rememberToken();
            $table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {

		});
		Schema::drop('users');
	}
}
