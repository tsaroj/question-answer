<?php

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
       $this->acll([
           UsersQuestionsAnswersTableSeeder::class,
           FavoritesTableSeeder::class,
       ]);
    }
}
