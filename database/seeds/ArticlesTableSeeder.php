<?php
/**
 * database/seeds/ArticlesTableSeeder.php
 * seeds Articles
 */

use Illuminate\Database\Seeder;

/**
 * class ArticlesTableSeeder
 */
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 4; $i++):
            DB::table('articles')->insert([
                'slug' => 'article_' . $i,
                'title' => 'Article ' . $i,
                'subtitle' => 'Sed mattis enim in nulla blandit tincidunt. Phasellus vel sem convallis, mattis est id, interdum augue. Integer luctus massa in arcu euismod venenatis. ',
                'text' => 'Sed mattis enim in nulla blandit tincidunt. Phasellus vel sem convallis, mattis est id, interdum augue. Integer luctus massa in arcu euismod venenatis. ',
                'image' => 'img/slides/' . $i . '.jpg',
                'slide' => true,
            ]);
        endfor;
    }
}
