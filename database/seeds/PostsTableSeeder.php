<?php
/**
 * database/seeds/PostsTableSeeder.php
 * seeds Posts
 */

use Illuminate\Database\Seeder;

/**
 * class PostsTableSeeder
 */
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++):
            DB::table('posts')->insert([
                'slug' => 'post_' . $i,
                'title' => 'Post ' . $i,
                'text' => '

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce laoreet feugiat ligula, quis pulvinar sem cursus vel. Duis posuere dictum quam. Curabitur varius eu magna non facilisis. Nunc id metus nec ipsum vestibulum dapibus. Curabitur ultricies, est id bibendum aliquam, leo metus laoreet diam, in mattis eros odio ut urna. Suspendisse potenti. Etiam et consequat dui. Quisque aliquet, felis ut molestie tempus, sapien neque consequat arcu, tempor venenatis mi nunc ac augue. Praesent non porttitor turpis, at malesuada magna. Curabitur ultricies scelerisque elit non malesuada. Aenean pulvinar ex quis neque tempor, eget accumsan quam interdum. Duis scelerisque nunc vel rhoncus dictum. Morbi ut ullamcorper ipsum.

Duis consequat mattis ipsum non efficitur. Cras nunc velit, dictum vitae fermentum in, consectetur eu nunc. In sit amet eros ligula. Nulla egestas dolor id fringilla efficitur. Nullam nibh lacus, porttitor in pretium vel, condimentum a nibh. Cras cursus, ligula id porta viverra, lorem sem ultrices nunc, in fringilla arcu leo a odio. Phasellus aliquet eget lacus non finibus. Donec sit amet vehicula mi.

Nunc aliquam metus ante, posuere efficitur tortor ultricies ac. Sed viverra in justo sed bibendum. Nam egestas dolor vel iaculis euismod. Donec quis neque at urna consequat aliquam. Quisque non turpis tellus. Morbi at pellentesque lectus. Aenean eleifend semper metus ac finibus. Donec euismod tempus ullamcorper.

Sed tristique auctor fermentum. Ut aliquam porttitor mauris, non lacinia turpis tristique quis. Nam volutpat dignissim mi, nec scelerisque dolor luctus sit amet. Nullam ut velit et lorem efficitur fermentum. Proin a elit justo. Fusce et dolor at est scelerisque ornare. Etiam faucibus nisl sit amet neque feugiat rutrum. Vivamus ac venenatis nibh, at accumsan quam. Aenean nec lorem at purus ultrices consequat non sed massa. Pellentesque lacinia ligula nec viverra pellentesque.

Nunc viverra aliquet imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed venenatis sit amet mi ut porta. Sed pharetra aliquet consequat. Cras eu urna convallis est laoreet imperdiet. Fusce a neque sodales, iaculis lacus sit amet, semper quam. Cras iaculis dapibus sem at bibendum. Pellentesque nibh metus, hendrerit at rutrum ut, tincidunt nec odio. Etiam metus felis, porttitor nec semper eu, viverra et ipsum. Mauris et urna porta, convallis risus sit amet, pharetra massa. Morbi ultrices nunc vel tincidunt dignissim. ',
                'image' => "img/blog/$i.jpg",
                'category_id' => rand(1,5),
            ]);
        endfor;
    }
}
