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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('project_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('level')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->dateTime('process_date');
            $table->string('seq_no');
            $table->string('document_no');
            $table->integer('department_id');
            $table->text('description');
            $table->integer('storage_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('detail_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id');
            $table->string('reference_no');
            $table->string('name');
            $table->text('notes');
            $table->integer('attachment_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('detil_document_id');
            $table->string('type');
            $table->string('filename');
            $table->text('link');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('session_logins', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('ip_address');
            $table->string('user_agent');
            $table->string('is_logout');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('department_id')->nullable();
            $table->string('project_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });

        Schema::create('level_storages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('storages');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('detail_documents');
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('session_logins');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('user_details');
        Schema::dropIfExists('level_storages');
    }
}
