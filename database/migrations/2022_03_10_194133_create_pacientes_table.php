<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePacientesTable.
 */
class CreatePacientesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table) {
            $table->increments('id');
			$table->string('cpf',11) ->unique();
			$table->string('name',50);
			$table->char('phone',11);
			$table->string('email',80) ->unique();
			
			
			

	
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
		Schema::drop('pacientes');
	}
}
