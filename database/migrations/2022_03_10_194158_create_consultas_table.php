<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateConsultasTable.
 */
class CreateConsultasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultas', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('paciente')->unsigned()->index();
			$table->integer('medico')->unsigned()->index();
			$table->date('date')->nullable();

			$table->foreign('paciente')->references('id')->on('pacientes');
			$table->foreign('medico')->references('id')->on('users');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}


	public function down()
	{
		Schema::table('consultas', function(Blueprint $table) {
			$table->dropForeign('consultas_id_paciente_foreign');
			$table->dropForeign('consultas_id_medico_foreign');
		});

		Schema::drop('consultas');
	}
}
