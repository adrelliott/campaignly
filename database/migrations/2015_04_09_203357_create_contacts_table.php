<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('organisation_id')->nullable();
			$table->smallInteger('department_id')->nullable();
			$table->smallInteger('user_id')->nullable()->unsigned()->index();

			$table->string('title', 50)->nullable();
			$table->string('first_name', 250)->index();
			$table->string('last_name', 250)->nullable()->index();
			$table->string('nickname', 250)->nullable()->index();
			$table->string('mobile', 21)->nullable();
			$table->string('landline', 21)->nullable();
			$table->string('phone_3', 21)->nullable();
			$table->string('phone_4', 21)->nullable();
			$table->string('email', 250)->nullable()->index();
			$table->string('email_2', 250)->nullable();
			$table->string('org_name', 500)->nullable();
			$table->string('address_1', 300)->nullable();
			$table->string('address_2', 300)->nullable();
			$table->string('address_3', 300)->nullable();
			$table->string('city', 150)->nullable();
			$table->string('postcode', 50)->nullable()->index();
			$table->string('county', 250)->nullable();
			$table->string('country', 350)->nullable();
			$table->string('gender',15)->nullable();
			$table->date('dob')->nullable()->index();
			$table->date('years_since')->nullable();

			// Prefs
			$table->boolean('opt_in_email')->default(0)->nullable();
			$table->boolean('opt_in_text')->default(0)->nullable();
			$table->boolean('opt_in_post')->default(0)->nullable();
			$table->string('active_days', 15)->default(1,2,3,4)->nullable();

			// Access fields
			$table->string('username', 250)->nullable();
			$table->string('password', 60)->nullable();
			$table->boolean( 'active' )->default( 1 )->nullable();
			$table->tinyInteger( 'auth_level' )->unsigned()->default( 3 );
			$table->boolean('email_permission')->nullable(TRUE)->default(FALSE);
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
		Schema::drop('contacts');
	}

}
