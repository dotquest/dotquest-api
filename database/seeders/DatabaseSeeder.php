<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('logins')->insert([
            'email' => 'admin@gmail.con',
            'senha' => bcrypt('123456'),
        ]);
    }
}
