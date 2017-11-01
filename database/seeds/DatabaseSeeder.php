<?php
/**
 * database/seeds/DatabaseSeeder.php
 * Appel tous les seeders
 */

use Illuminate\Database\Seeder;

/**
 * class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder 
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(WorksTableSeeder::class);
    }

}
