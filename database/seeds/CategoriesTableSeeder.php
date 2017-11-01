<?php
/**
 * database/seeds/CategoriesTableSeeder.php
 * seeds Categories
 */

use Illuminate\Database\Seeder;

/**
 * class CategoriesTableSeeder
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++):
            DB::table('categories')->insert([
                'name' => 'Categorie ' . $i,
                'slug' => 'categorie_' . $i,
            ]);
        endfor;
    }
}
