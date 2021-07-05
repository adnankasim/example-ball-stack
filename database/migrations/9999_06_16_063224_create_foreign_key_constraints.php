<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyConstraints extends Migration
{
    public function up()
    {
        // users w/ citizens
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('citizen_id')->references('id')->on('citizens')->onUpdate('cascade')->onDelete('cascade');
        });

        // submission_messages w/ submissions & users
        Schema::table('submission_messages', function (Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // submission_files w/ submissions, files & service_requisites
        Schema::table('submission_files', function (Blueprint $table) {
            $table->foreign('file_id')->references('id')->on('files')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('service_requisite_id')->references('id')->on('service_requisites')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('submission_id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
        });

        // submission_datas w/ submissions & requisite_inputs
        Schema::table('submission_datas', function (Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('requisite_input_id')->references('id')->on('requisite_inputs')->onUpdate('cascade')->onDelete('cascade');
        });

        // submissions w/ users, citizens & services
        Schema::table('submissions', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('citizens')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('submitter_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // submission_progresses w/ submissions, procedures & users
        Schema::table('submission_progresses', function (Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('procedure_id')->references('id')->on('procedures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('validator_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // products w/ submissions, bureaus & users
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('submission_id')->references('id')->on('submissions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('issuer_id')->references('id')->on('bureaus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('uploader_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // bureau_staffs w/ roles, bureaus & users
        Schema::table('bureau_staffs', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bureau_id')->references('id')->on('bureaus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('backend_user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        // requisite_documents w/ service_requisites & document_types
        Schema::table('requisite_documents', function (Blueprint $table) {
            $table->foreign('service_requisite_id')->references('id')->on('service_requisites')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_type_id')->references('id')->on('document_types')->onUpdate('cascade')->onDelete('cascade');
        });

        // requisite_inputs w/ service_requisites
        Schema::table('requisite_inputs', function (Blueprint $table) {
            $table->foreign('service_requisite_id')->references('id')->on('service_requisites')->onUpdate('cascade')->onDelete('cascade');
        });

        // service_requisites w/ services
        Schema::table('service_requisites', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });

        // procedures w/ services
        Schema::table('procedures', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });

        // procedure_validators w/ users & procedures
        Schema::table('procedure_validators', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('procedure_id')->references('id')->on('procedures')->onUpdate('cascade')->onDelete('cascade');
        });

        // services w/ bureaus
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('bureau_id')->references('id')->on('bureaus')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    public function down()
    {
        // users w/ citizens
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['citizen_id']);
        });

        // submission_messages w/ submissions & users
        Schema::table('submission_messages', function (Blueprint $table) {
            $table->dropForeign('submission_messages_sender_id_foreign');
            $table->dropForeign(['submission_id']);
        });

        // submission_files w/ submissions, files & service_requisites
        Schema::table('submission_files', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
            $table->dropForeign(['service_requisite_id']);
            $table->dropForeign(['submission_id']);
        });

        // submission_datas w/ submissions & requisite_inputs
        Schema::table('submission_datas', function (Blueprint $table) {
            $table->dropForeign(['requisite_input_id']);
            $table->dropForeign(['submission_id']);
        });

        // submissions w/ users, citizens & services
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropForeign('submissions_applicant_id_foreign');
            $table->dropForeign('submissions_submitter_id_foreign');
        });

        // submission_progresses w/ submissions, procedures & users
        Schema::table('submission_progresses', function (Blueprint $table) {
            $table->dropForeign(['submission_id']);
            $table->dropForeign(['procedure_id']);
            $table->dropForeign('submission_progresses_validator_id_foreign');
        });

        // products w/ submissions, bureaus & users
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['submission_id']);
            $table->dropForeign('products_issuer_id_foreign');
            $table->dropForeign('products_uploader_id_foreign');
        });

        // bureau_staffs w/ roles, bureaus & users
        Schema::table('bureau_staffs', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['bureau_id']);
            $table->dropForeign(['backend_user_id']);
        });

        // requisite_documents w/ service_requisites & document_types
        Schema::table('requisite_documents', function (Blueprint $table) {
            $table->dropForeign(['service_requisite_id']);
            $table->dropForeign(['document_type_id']);
        });

        // requisite_inputs w/ service_requisites
        Schema::table('requisite_inputs', function (Blueprint $table) {
            $table->dropForeign(['service_requisite_id']);
        });

        // service_requisites w/ services
        Schema::table('service_requisites', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });

        // procedures w/ services
        Schema::table('procedures', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
        });

        // procedure_validators w/ users & procedures
        Schema::table('procedure_validators', function (Blueprint $table) {
            $table->dropForeign(['procedure_id']);
            $table->dropForeign(['user_id']);
        });

        // services w/ bureaus
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['bureau_id']);
        });

    }
}
