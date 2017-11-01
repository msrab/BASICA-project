<?php
/**
 * app/Http/Controllers/PostsController.php
 * Controller des posts
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Validator;

/**
 * class PostsController
 */
class PostsController extends Controller {

    /**
     * Affiche la liste des posts récent
     * 
     * @param Request $request numero de la page envoyé en ajax
     * @return view
     */
    public function index(Request $request) {
        if ($request->get('page')):
            $page = $request->get('page');
            $offset = (($request->get('page') - 1) * 6);
        else:
            $offset = 0;
            $page = 1;
        endif;

        $posts = Post::orderBy('created_at', 'desc')
                ->offset($offset)
                ->take(6)
                ->get();

        $allPosts = Post::all();
        $pages = ceil(count($allPosts) / 6);


        if ($request->ajax()):
            return response()->json(View('posts.posts', [
                        'posts' => $posts,
                        'pages' => $pages,
                        'page' => $page
            ])->render());
        endif;


        return View('posts.index', [
            'posts' => $posts,
            'pages' => $pages,
            'page' => $page
        ]);
    }

    /**
     * Affiche la page de détails d'un post
     * 
     * @param type $slug slug du post à afficher
     * @return type
     */
    public function show($slug) {
        $post = Post::where('slug', '=', $slug)
                ->firstOrFail();

        $posts = Post::where('id', '<>', $post->id)
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get();

        $categories = Category::all();

        return View('posts.show', [
            'posts' => $posts,
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /* ****************************** ADMIN ******************************** */

    /**
     * Affiche la liste des posts
     * 
     * @return view
     */
    public function liste() {
        $posts = Post::orderBy('created_at', 'desc')
                ->get();

        return View('posts.admin.liste', [
            'posts' => $posts
        ]);
    }

    /**
     * Affiche le formulaire d'édition d'un post
     * 
     * @param type $slug slug du posts à modifier
     * @return view
     */
    public function edit($slug) {
        $post = Post::where('slug', '=', $slug)
                ->firstOrFail();
        
        $categories = Category::all();

        $cats = array();

        foreach ($categories as $category):
            $cats[$category->id] = $category->name;
        endforeach;

        return View('posts.admin.edit', [
            'post' => $post,
            'cats' => $cats
        ]);
    }

    /**
     * Enregistre les modification apportées à un post
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des posts
     */
    public function update(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'title' => 'required',
            'slug' => 'required',
            'text' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            $postOriginal = Categorie::find($request->get('id'));
        
            return Redirect('posts/' . $postOriginal->slug . '/edit')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $post = Post::find($request->get('id'));
        
        $post->title = e($request->get('title'));
        $post->slug = e($request->get('slug'));
        $post->text = e($request->get('text'));
        $post->category_id = e($request->get('categorie'));

        if ($request->file('image')):
            $img = date('ymdHis') . '.' . $request
                ->file('image')
                ->getClientOriginalExtension();
        
            $post->image = 'img/blog/' . $img;
        endif;

        $rep = $post->save();

        if (!$rep):
            $categorieOriginal = Categorie::find($request->get('id'));
        
            return Redirect('posts/' . $postOriginal->slug . '/edit')
                    ->withInput()
                    ->with('alert_error', 'Un problème avec la sauvegarde');
        endif;

        if ($request->file('image')):
            $request
                ->file('image')
                ->move('img/blog/', $img);
        endif;

        return Redirect('admin/posts')
                ->with('alert_success', 'Votre post a bien été mis à jour.');
    }

    /**
     * Supprime un post
     * 
     * @param type $slug slug du post à supprimer
     * @return redirect redirection vers la liste des posts
     */
    public function destroy($slug) {
        $post = Post::where('slug', '=', $slug)
                ->firstOrFail();
        
        if ($post):
            if ((!(empty($post->image))) && (file_exists($post->image))):
                unlink($post->image);
            endif;
            
            $post->delete();
        endif;

        return Redirect('admin/posts')
                ->with('alert_success', 'Post supprimé.');
    }

    /**
     * Affiche le formulaire de création d'un posts
     * 
     * @return view
     */
    public function create() {
        $categories = Category::all();

        $cats = array();

        foreach ($categories as $category):
            $cats[$category->id] = $category->name;
        endforeach;

        return View('posts.admin.create', [
            'cats' => $cats
        ]);
    }

    /**
     * Enregistre le post créé
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des posts
     */
    public function store(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'title' => 'required',
            'slug' => 'required',
            'text' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            return Redirect('admin/posts/create')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;



        if ($request->file('image')):
            $img = date('ymdHis') . '.' . $request
                    ->file('image')
                    ->getClientOriginalExtension();
        
            $request->file('image')
                    ->move('img/blog/', $img);
        endif;

        $post = Post::create(array(
                    'title' => e($request->get('title')),
                    'slug' => e($request->get('slug')),
                    'text' => e($request->get('text')),
                    'category_id' => e($request->get('categorie')),
                    'image' => 'img/blog/' . $img
        ));

        if (!$post):
            return Redirect('admin/posts/create')
                ->withInput()
                ->with('alert_error', 'Un problème est survenue avec la sauvegarde');
        endif;

        return Redirect('admin/posts')
                ->with('alert_success', 'Votre post a bien été ajouté.');
    }

}
