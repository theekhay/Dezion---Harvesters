<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBranchMemberTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_member_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('branch_id');

            $table->integer('approved_by')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->integer('status')->default('0');

            $table->integer('created_by');
            $table->integer('deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'branch_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branch_member_types');
    }
}
