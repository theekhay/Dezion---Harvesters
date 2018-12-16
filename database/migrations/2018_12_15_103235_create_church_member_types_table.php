<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChurchMemberTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_member_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code')->nullable();

            $table->boolean('status')->default('1');
            $table->integer('church_id');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

            $table->json('excluded_branches')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'church_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('church_member_types');
    }
}
