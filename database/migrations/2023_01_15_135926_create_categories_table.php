<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });
        
        // insert sample data in the categories table
        DB::table('categories')->insert([
            ['name' => 'Elektronika', 'description' => 'Elektronikos prekės'],
            ['name' => 'Kosmetika', 'description' => 'Kosmetikos prekės'],
            ['name' => 'Baldai', 'description' => 'Lauko, biuro, miegamojo baldai'],
            ['name' => 'Maistas', 'description' => 'Maisto prekės'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
