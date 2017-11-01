<?php
/**
 * app/Http/Controllers/TagsController.php
 * Controller des tags
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tag;
use Validator;

/**
 * class TagsController
 */
class TagsController extends Controller {
    /* ****************************** ADMIN ******************************** */

    /**
     * Affiche la liste des tags
     * 
     * @return view
     */
    public function liste() {
        $tags = Tag::orderBy('name', 'asc')
                ->get();

        return View('tags.admin.liste', [
            'tags' => $tags
        ]);
    }

    /**
     * Affiche le formulaire d'édition d'un tag
     * 
     * @param type $slug slug du tag à modifier
     * @return view
     */
    public function edit($slug) {
        $tag = Tag::where('slug', '=', $slug)
                ->firstOrFail();

        return View('tags.admin.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Enregistre des modifications apportées au tag
     *  
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des tags
     */
    public function update(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            $tagOriginal = Tag::find($request->get('id'));
        
            return Redirect('admin/tags/' . $tagOriginal->slug . '/edit')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $tag = Tag::find($request->get('id'));
        
        $tag->name = e($request->get('name'));
        $tag->slug = e($request->get('slug'));

        $rep = $tag->save();

        if (!$rep):
            $tagOriginal = Tag::find($request->get('id'));
        
            return Redirect('admin/tags/' . $tagOriginal->slug . '/edit')
                    ->withInput()
                    ->with('alert_error', 'Un problème avec la sauvegarde');
        endif;

        return Redirect('admin/tags')
                ->with('alert_success', 'Votre categorie a bien été mis à jour.');
    }

    /**
     * Supprime un slug et tous les rélations de ce tag avec des works
     * 
     * @param type $slug slug du tag à supprimer
     * @return redirect redirection vers la liste des tags
     */
    public function destroy($slug) {
        $tag = Tag::where('slug', '=', $slug)
                ->firstOrFail();
        
        $tagsWorks = DB::table('tag_work')
                ->selectRaw('*')
                ->where('tag_id', '=', $tag->id);
        
        if ($tag):
            $tag->delete();
            $tagsWorks->delete();
        endif;

        return Redirect('admin/tags')
                ->with('alert_success', 'Tag supprimé.');
    }

    /**
     * Affiche le formulaire de création d'un tag
     * 
     * @return view
     */
    public function create() {
        return View('tags.admin.create');
    }

    /**
     * Enregistre le tag créé
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des tags
     */
    public function store(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            return Redirect('admin/tags/create')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $tag = Tag::create(array(
                    'name' => e($request->get('name')),
                    'slug' => e($request->get('slug'))
        ));

        if (!$tag):
            return Redirect('admin/tags/create')
                ->withInput()
                ->with('alert_error', 'Un problème est survenue avec la sauvegarde.');
        endif;

        return Redirect('admin/tags')
                ->with('alert_success', 'Votre categorie a bien été ajouté.');
    }
    
    /**
     * Autocomplétion des tags dans le formulaire d'ajout d'un work
     * 
     * @param Request $request donnée du formulaire
     * @return $resultats la liste des résultats 
     */
    public function ajax(Request $request){
        $input = $request->get('input');
        
        $tags = Tag::where('name', 'LIKE', $input.'%')
                ->get();
        
        $resultats = array();
        foreach($tags as $tag):
            $resultats[] = [
                'id' => $tag->id,
                'value' => $tag->name
            ];
        endforeach;
        
        return response()->json($resultats);
    }
    
}
