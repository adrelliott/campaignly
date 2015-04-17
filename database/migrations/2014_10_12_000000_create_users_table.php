<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger( 'organisation_id' )->nullable()->unsigned()->index();
			$table->smallInteger( 'department_id' )->nullable()->unsigned();

			$table->string( 'first_name', 250 );
			$table->string( 'last_name', 250 );
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string( 'role', 250 );
			$table->string( 'username', 60 )->unique();
			$table->boolean( 'active' )->default( 1 )->nullable();
			$table->tinyInteger( 'auth_level' )->unsigned()->default( 3 );
			$table->rememberToken();

			// Standard cols
			$table->smallInteger( 'tenant_id' )->unsigned()->index();
			$table->softDeletes();
			$table->timestamps();
			$table->smallInteger( 'created_by' )->unsigned();
			$table->smallInteger( 'updated_by' )->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
