<?php
/**
 * app/Http/Controllers/CategoriesController.php
 * Controller des catégories
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;

/**
 * class CategorieController
 */
class CategoriesController extends Controller
{
    /**
     * Affiche la liste des posts de la catégorie
     * 
     * @param type $slug slug de la catégorie
     * @return view 
     */
    public function show($slug)
    {
        $posts = Category::where('slug', '=', $slug)
                ->firstOrFail()
                ->posts()
                ->paginate(6);
        
        return View('posts.index', [
            'posts' => $posts,
            'pages' => 1,
            'page' => 1
        ]);
    }
    
    /* ****************************** ADMIN ******************************** */

    /**
     * Affiche la liste des catégories 
     * 
     * @return view
     */
    public function liste() {
        $categories = Category::orderBy('name', 'asc')
                ->get();

        return View('categories.admin.liste', [
            'categories' => $categories
        ]);
    }

    /**
     * Affiche le formulaire d'édition d'une categorie
     * 
     * @param type $slug slug de la catégorie à éditer
     * @return view 
     */
    public function edit($slug) {
        $category = Category::where('slug', '=', $slug)
                ->firstOrFail();

        return View('categories.admin.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Enregistre les modification apportées à la catégorie
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des catégories
     */
    public function update(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            $categorieOriginal = Categorie::find($request->get('id'));
        
            return Redirect('admin/categories/' .$categorieOriginal->slug. '/edit')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $category = Category::find($request->get('id'));
        $category->name = e($request->get('name'));
        $category->slug = e($request->get('slug'));

        $rep = $category->save();
        
        if (!$rep):
            $categorieOriginal = Categorie::find($request->get('id'));
        
            return Redirect('admin/categories/' .$categorieOriginal->slug. '/edit')
                    ->withInput()
                    ->with('alert_error', 'Un problème avec la sauvegarde');
        endif;

        return Redirect('admin/categories')
                ->with('alert_success', 'Votre categorie a bien été mis à jour.');
    }

    /**
     * Supprime une catégorie
     * 
     * @param type $slug slug de la catégorie à supprimer
     * @return redirect redirection vers la liste des catégories
     */
    public function destroy($slug) {
        $category = Category::where('slug', '=', $slug)
                ->firstOrFail();
        
        if ($category):
            $category->delete();
        endif;

        return Redirect('admin/categories')
                ->with('alert_success', 'Categorie supprimé.');
    }

    /**
     * Affiche le formulaire de création d'une catégorie
     * 
     * @return view
     */
    public function create() {
        return View('categories.admin.create');
    }

    /**
     * Enregistre la catégorie créée
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des catégorie
     */
    public function store(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            return Redirect('admin/categories/create')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $category = Category::create(array(
                    'name' => e($request->get('name')),
                    'slug' => e($request->get('slug'))
        ));

        if (!$category):
            return Redirect('admin/categories/create')
            ->withInput()
            ->with('alert_error', 'Un problème est survenue avec la sauvegarde.');
        endif;

        return Redirect('admin/categories')
                ->with('alert_success', 'Votre categorie a bien été ajouté.');
    }

}
