<?php
/**
 * database/seeds/TagsTableSeeder.php
 * seeds Tags
 */

use Illuminate\Database\Seeder;

/**
 * class TagsTableSeeder
 */
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++):
            DB::table('tags')->insert([
                'name' => 'Tag ' . $i,
                'slug' => 'tag_' . $i
            ]);
        endfor;
        
        for ($i = 1; $i < 10; $i++):
            $r = rand(1, 5);

            for ($j = 1; $j < $r; $j++):


                DB::table('tag_work')->insert([
                    'work_id' => $i,
                    'tag_id' => $j,
                ]);
            endfor;
        endfor;
    }
}
