<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DigitalFillingDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('project_id');
            $table->integer('department_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('storage', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('level');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->dateTime('process_date');
            $table->string('seq_no');
            $table->string('document_no');
            $table->integer('department_id');
            $table->text('description');
            $table->integer('storage_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('detail_document', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id');
            $table->string('reference_no');
            $table->string('name');
            $table->text('notes');
            $table->integer('attachment_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('attachment', function (Blueprint $table) {
            $table->id();
            $table->integer('detil_document_id');
            $table->string('type');
            $table->string('filename');
            $table->text('link');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('session_login', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('ip_address');
            $table->string('user_agent');
            $table->string('is_logout');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user');
        Schema::dropIfExists('storage');
        Schema::dropIfExists('document');
        Schema::dropIfExists('detail_document');
        Schema::dropIfExists('attachment');
        Schema::dropIfExists('department');
        Schema::dropIfExists('session_login');
        Schema::dropIfExists('project');

    }
}
