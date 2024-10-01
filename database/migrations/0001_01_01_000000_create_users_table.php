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
				//MySql
        Schema::connection("mysql")->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('email')->unique();
            $table->timestamp('date_of_birth');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::connection("mysql")->create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::connection("mysql")->create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
	    
	    //Sqlite
	    Schema::connection("sqlite")->create('users', function (Blueprint $table) {
		    $table->id();
		    $table->string('nickname');
		    $table->string('email')->unique();
		    $table->timestamp('date_of_birth');
		    $table->string('password');
		    $table->rememberToken();
		    $table->timestamps();
	    });
	    
	    Schema::connection("sqlite")->create('password_reset_tokens', function (Blueprint $table) {
		    $table->string('email')->primary();
		    $table->string('token');
		    $table->timestamp('created_at')->nullable();
	    });
	    
	    Schema::connection("sqlite")->create('sessions', function (Blueprint $table) {
		    $table->string('id')->primary();
		    $table->foreignId('user_id')->nullable()->index();
		    $table->string('ip_address', 45)->nullable();
		    $table->text('user_agent')->nullable();
		    $table->longText('payload');
		    $table->integer('last_activity')->index();
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::connection("mysql")->dropIfExists('users');
      Schema::connection("mysql")->dropIfExists('password_reset_tokens');
      Schema::connection("mysql")->dropIfExists('sessions');
	    
	    Schema::connection("sqlite")->dropIfExists('users');
	    Schema::connection("sqlite")->dropIfExists('password_reset_tokens');
	    Schema::connection("sqlite")->dropIfExists('sessions');
    }
};
