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
				//MySQL
      Schema::connection("mysql")->create('cache', function (Blueprint $table) {
          $table->string('key')->primary();
          $table->mediumText('value');
          $table->integer('expiration');
      });
	    
	    Schema::connection("mysql")->create('cache_locks', function (Blueprint $table) {
          $table->string('key')->primary();
          $table->string('owner');
          $table->integer('expiration');
      });
				
			// SQLite
			Schema::connection("sqlite")->create('cache', function (Blueprint $table) {
          $table->string('key')->primary();
          $table->mediumText('value');
          $table->integer('expiration');
      });
      Schema::connection("sqlite")->create('cache_locks', function (Blueprint $table) {
          $table->string('key')->primary();
          $table->string('owner');
          $table->integer('expiration');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      //MySQL
	    Schema::connection("mysql")->dropIfExists('cache');
	    Schema::connection("mysql")->dropIfExists('cache_locks');
			
			//SQLite
	    Schema::connection("sqlite")->dropIfExists('cache');
	    Schema::connection("sqlite")->dropIfExists('cache_locks');
    }
};
