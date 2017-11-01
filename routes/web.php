<?php
/**
 * routes/web.php
 * routing 
 */

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


/* * ******************* ADMIN ******************** */
Route::prefix('admin')->middleware('auth')->group(function() {

    // Routes des articles
    Route::prefix('articles')->group(function() {
        Route::name('admin.articles')
                ->get('/', 'ArticlesController@liste');

        Route::name('articles.create')
                ->get('create', 'ArticlesController@create');

        Route::name('articles.store')
                ->post('store', 'ArticlesController@store');

        Route::name('articles.destroy')
                ->get('{slug}/destroy', 'ArticlesController@destroy');

        Route::name('articles.edit')
                ->get('{slug}/edit', 'ArticlesController@edit');

        Route::name('articles.update')
                ->post('update', 'ArticlesController@update');
    });

    // Routes des posts
    Route::prefix('posts')->group(function() {
        Route::name('admin.posts')
                ->get('/', 'PostsController@liste');

        Route::name('posts.create')
                ->get('create', 'PostsController@create');

        Route::name('posts.store')
                ->post('store', 'PostsController@store');

        Route::name('posts.destroy')
                ->get('{slug}/destroy', 'PostsController@destroy');

        Route::name('posts.edit')
                ->get('{slug}/edit', 'PostsController@edit');

        Route::name('posts.update')
                ->post('update', 'PostsController@update');
    });

    // Routes des works
    Route::prefix('works')->group(function(){
        Route::name('admin.works')
                ->get('/', 'WorksController@liste');
        
        Route::name('works.create')
                ->get('create', 'WorksController@create');
        
        Route::name('works.store')
                ->post('store', 'WorksController@store');
        
        Route::name('works.destroy')
                ->get('{slug}/destroy', 'WorksController@destroy');
        
        Route::name('works.edit')
                ->get('{slug}/edit', 'WorksController@edit');
        
        Route::name('works.update')
                ->post('update', 'WorksController@update');
    });
    
    // Routes des categories
    Route::prefix('categories')->group(function(){
        Route::name('admin.categories')
                ->get('/', 'CategoriesController@liste');
        
        Route::name('categories.create')
                ->get('create', 'CategoriesController@create');
        
        Route::name('categories.store')
                ->post('store', 'CategoriesController@store');
        
        Route::name('categories.destroy')
                ->get('{slug}/destroy', 'CategoriesController@destroy');
        
        Route::name('categories.edit')
                ->get('{slug}/edit', 'CategoriesController@edit');
        
        Route::name('categories.update')
                ->post('update', 'CategoriesController@update');
    });
    
    // Routes des tags
    Route::prefix('tags')->group(function(){
        
        Route::name('tags.create')
                ->get('create', 'TagsController@create');
        
        Route::name('tags.store')
                ->post('store', 'TagsController@store');
        
        Route::name('tags.destroy')
                ->get('{slug}/destroy', 'TagsController@destroy');
        
        Route::name('tags.edit')
                ->get('{slug}/edit', 'TagsController@edit');
        
        Route::name('tags.update')
                ->post('update', 'TagsController@update');
        
        Route::name('tags.ajax')
                ->post('ajax', 'TagsController@ajax');
        
        Route::name('admin.tags')
                ->get('/', 'TagsController@liste');
    });
    
    // Routes de déconnexion
    Route::name('logout')
            ->get('logout', 'UsersController@logout');
    
    // Routes du dashboard
    Route::name('admin')
            ->get('/', 'HomeController@admin');
});



/* * ******************* PUBLIC ******************** */

// Routes des posts
Route::prefix('posts')->group(function() {
    Route::name('posts.index')
            ->get('/', 'PostsController@index');

    Route::name('posts.show')
            ->get('{slug}', 'PostsController@show');
});

// Routes des works
Route::prefix('works')->group(function() {
    
    Route::name('works.show')
            ->get('{slug}', 'WorksController@show');
    
    Route::name('works.index')
            ->get('/', 'WorksController@index');
});

// Route vers les posts par categorie
Route::name('categories.show')
            ->get('categories/{slug}', 'CategoriesController@show');

// Route vers la page de contact
Route::name('contact.index')
            ->get('contact', 'ContactController@index');

// Route pour l'autocompletion des tags dans le formulaire des works (ajax)
Route::name('tags.search')
            ->get('search/autocomplete', 'TagsController@autocomplete');

// Route de connexion vers l'administration
Auth::routes();

// Route vers la page d'accueil
Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

// Route vers la page d'accueil
Route::get('/404', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);
