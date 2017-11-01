<?php
/**
 * database/seeds/WorksTableSeeder.php
 * seeds Works
 */

use Illuminate\Database\Seeder;

/**
 * class WorksTableSeeder.php
 */
class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++):
            DB::table('works')->insert([
                'slug' => 'work_' . $i,
                'name' => 'Work ' . $i,
                'description' => 'blabla bla et voila' . $i,
                'image' => "img/portfolio/$i.jpg",
                'client' => 'Hamoud Boualem',
            ]);
        endfor;
    }
}
