<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_08_10_222103_create_turmas_table.php
class CreateTurmasTable extends Migration
=======
class CreateTagsTable extends Migration
>>>>>>> 1552b481862246da7f2899a15c4c36b74088f215:database/migrations/2021_07_29_151751_create_tags_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_08_10_222103_create_turmas_table.php
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string ('nomeTurma', 45);
            $table->text ('descrição');
            $table->string ('ano', 4);
=======
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
>>>>>>> 1552b481862246da7f2899a15c4c36b74088f215:database/migrations/2021_07_29_151751_create_tags_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2021_08_10_222103_create_turmas_table.php
        Schema::dropIfExists('turmas');
=======
        Schema::dropIfExists('tags');
>>>>>>> 1552b481862246da7f2899a15c4c36b74088f215:database/migrations/2021_07_29_151751_create_tags_table.php
    }
}
