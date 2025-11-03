<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //NOTE: We create a table to store the users that will log in via SAML.
        //The individual columns are a replica of the data we are getting from ULCN.
        //We do this so that we can use 'Auth' and 'User', which come as a default in Laravel.
        //'cn' is the ULCN username.
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cn')->unique();
            $table->string('fullName');
            $table->string('ULCNuserCLass');
            $table->string('ulcnmailCorrespondence');
            $table->string('preferredName');
            $table->string('sn');
            /* EXAMPLE: additional fields that can be requested to ULCN. Make sure the database migrations reflect these entries
            $table->string('ULCNp1UserOrgLevel1');
            $table->string('ULCNp1UserOrgLevel2');
            $table->string('ULCNp1UserOrgLevel3');
            $table->string('ULCNp1UserOrgLevel4');
            */
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
