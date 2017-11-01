<?php
/**
 * app/Http/Controllers/ArticlesController.php
 * Controller des articles
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Validator;

/**
 * Class ArticleController
 * Controller des articles
 */
class ArticlesController extends Controller {

    /**
     * Affiche la liste des articles recent dans le slider
     * 
     * @return view liste des articles
     */
    public function liste() {
        $articles = Article::orderBy('slide', 1)
                ->orderBy('created_at', 'desc')
                ->get();

        return View('articles.admin.liste', [
            'articles' => $articles
        ]);
    }

    /* ****************************** ADMIN ******************************** */
    
    /**
     * Affiche le formulaire de création d'un article
     * 
     * @return view formulaire 
     */
    public function create() {
        return View('articles.admin.create');
    }

    /**
     * Cré un article 
     * 
     * @param Request $request les données du formulaire
     * @return redirect redirection vers la liste des articles
     */
    public function store(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'title' => 'required',
            'slug' => 'required',
            'subtitle' => 'required',
            'text' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            return Redirect('admin/articles/create')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        if ($request->file('image')):
            $img = date('ymdHis').'.'.$request
                    ->file('image')
                    ->getClientOriginalExtension();
        
            $request
                    ->file('image')
                    ->move('img/', $img);
        endif;

        if ($request->get('slide')):
            $slide = 1;
        else:
            $slide = 0;
        endif;

        $article = Article::create(array(
                    'title' => e($request->get('title')),
                    'slug' => e($request->get('slug')),
                    'subtitle' => e($request->get('subtitle')),
                    'text' => e($request->get('text')),
                    'image' => 'img/' . $img,
                    'slide' => $slide
        ));

        if (!$article):
            return Redirect('admin/articles/create')
                            ->withInput()
                            ->with('alert_error', 'Un problème est survenue lors de la sauvegarde.');
        endif;

        return Redirect('admin/articles')
                        ->with('alert_success', 'Votre article a bien été ajouté.');
    }

    /**
     * Supprime un article
     * 
     * @param type $slug slug de l'article à supprimer
     * @return redirect redirection vers la liste des articles
     */
    public function destroy($slug) {
        $article = Article::where('slug', $slug)->firstOrFail();
        if ($article):
            if ((!(empty($article->image))) && (file_exists($article->image))):
                unlink($article->image);
            endif;
            $article->delete();
        endif;
        return Redirect('admin/articles')
                ->with('alert_success', 'L\'article a été supprimé.');

    }

    /**
     * Affiche le formulaire de modification d'un article
     * 
     * @param type $slug slug de l'article à modifier
     * @return redirect redirection vers la liste des articles
     */
    public function edit($slug) {
        $article = Article::where('slug', '=', $slug)
                ->firstOrFail();

        if ($article):
            return View('articles.admin.edit', [
                'article' => $article
            ]);
        endif;
    }

    /**
     * Enregistre les modification apporté à un article
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des articles
     */
    public function update(Request $request)
    {
        $inputs = $request->all();

        $rules = array(
            'title' => 'required',
            'slug' => 'required',
            'subtitle' => 'required',
            'text' => 'required',
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            $articleOriginal = Article::find($request->get('id'));
            return Redirect('admin/articles/'.$articleOriginal->slug.'/edit')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        if(($request->get('slide')) !== null):
            $slide = 1;
        else:
            $slide = 0;
        endif;

        $article = Article::find($request->get('id'));
        
        $article->title = e($request->get('title'));
        $article->slug = e($request->get('slug'));
        $article->subtitle = e($request->get('subtitle'));
        $article->text = e($request->get('text'));
        
        
        if ($request->file('image')):
            unlink($article->image);
        
            $img = date('ymdHis').'.'.$request
                    ->file('image')
                    ->getClientOriginalExtension();
            
            $request
                    ->file('image')
                    ->move('img/',$img);
            
            $article->image = 'img/'.$img;
        endif;
        
        $article->slide = $slide;
        

        $reponse = $article->save();

        if (!$reponse):
            $articleOriginal = Article::find($request->get('id'));
        
            return Redirect('admin/articles/'.$articleOriginal->slug.'/create')
                            ->withInput()
                            ->with('alert_error', 'Un problème est survenue lors de la sauvegarde.');
        endif;

        
        
        return Redirect('admin/articles')
                        ->with('alert_success', 'Votre article a bien été mis à jour.');
    }
}
