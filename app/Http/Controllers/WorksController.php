<?php
/**
 * app/Http/Controllers/WorksController.php
 * Controller des works
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Work;
use App\Tag;
use Validator;

/**
 * class WorksController
 */
class WorksController extends Controller {

    /**
     * Affiche la liste des works recent
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

        $works = Work::orderBy('created_at', 'desc')
                ->offset($offset)
                ->take(6)
                ->get();

        $allWorks = Work::all();
        $pages = ceil(count($allWorks) / 6);

        if ($request->ajax()):
            return response()
                ->json(View('works.list', [
                    'works' => $works
                ])->render());
        endif;


        return View('works.index', [
            'works' => $works,
            'pages' => $pages
        ]);
    }

    /**
     * Affiche la page de détails d'un work et une liste de works similaire
     * 
     * @param type $slug slug du work à afficher
     * @return view
     */
    public function show($slug) {
        $work = Work::where('slug', '=', $slug)
                ->firstOrFail();

        // WORKS SIMILAIRES
        $works2 = null;

        if (count($work->tags) != 0):
            $tags = array();

            foreach ($work->tags as $tag):
                $tags[$tag->id] = $tag->id;
            endforeach;

            $works = DB::table('works')
                    ->selectRaw('count(works.id) AS cnt, works.*')
                    ->join('tag_work', 'works.id', '=', 'tag_work.work_id')
                    ->whereIn('tag_work.tag_id', $tags)
                    ->where('tag_work.work_id', '<>', $work->id)
                    ->groupBy('works.id')
                    ->orderBy('cnt', 'desc')
                    ->orderBy('works.created_at', 'desc')
                    ->take(4)
                    ->get();
            
            if (count($works) < 4):
                $ids = array();
                foreach ($works as $w):
                    $ids[$w->id] = $w->id;
                endforeach;

                $works2 = Work::whereNotIn('id', $ids)
                        ->where('id', '<>', $work->id)
                        ->inRandomOrder()
                        ->take(4 - count($works))
                        ->get();
            endif;
        else:
            $works = Work::where('id', '<>', $work->id)
                    ->inRandomOrder()
                    ->take(4)
                    ->get();
        endif;
        return View('works.show', [
            'work' => $work,
            'works' => $works,
            'works2' => $works2
        ]);
    }

    /* ****************************** ADMIN ******************************** */

    /**
     * Affiche la liste des works
     * 
     * @return view
     */
    public function liste() {
        $works = Work::orderBy('created_at', 'desc')
                ->get();

        return View('works.admin.liste', [
            'works' => $works
        ]);
    }

    /**
     * Affiche le formulaire d'édition d'un work
     * 
     * @param type $slug slug du work à modifier
     * @return view
     */
    public function edit($slug) {
        $work = Work::where('slug', '=', $slug)
                ->firstOrFail();

        return View('works.admin.edit', [
            'work' => $work,
        ]);
    }

    /**
     * Enregistre les modification apportées au work
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des works
     */
    public function update(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'client' => 'required'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            $workOriginal = Work::find($request->get('id'));
        
            return Redirect('admin/works/' . $workOriginal->slug . '/edit')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;

        $work = Work::find($request->get('id'));
        
        $work->name = e($request->get('name'));
        $work->slug = e($request->get('slug'));
        $work->description = e($request->get('description'));
        $work->client = e($request->get('client'));

        if ($request->file('image')):
            $img = date('ymdHis') . '.' . $request
                ->file('image')
                ->getClientOriginalExtension();
        
            $work->image = 'img/portfolio/' . $img;
        endif;

        $rep = $work->save();
        
        if (!$rep):
            $workOriginal = Work::find($request->get('id'));
        
            return Redirect('admin/works/' . $workOriginal->slug . '/edit')
                    ->withInput()
                    ->with('alert_error', 'Un problème avec la sauvegarde');
        endif;

        if ($request->file('image')):
            $request->file('image')
                    ->move('img/portfolio/', $img);
        endif;

        return Redirect('admin/works')
                ->with('alert_success', 'Votre work a bien été mis à jour.');
    }

    /**
     * Supprime un work
     * 
     * @param type $slug slug du work à supprimer
     * @return redirect redirection la liste de works
     */
    public function destroy($slug) {
        $work = Work::where('slug', '=', $slug)
                ->firstOrFail();
        
        $tagsWorks = DB::table('tag_work')
                ->selectRaw('*')
                ->where('work_id', '=', $work->id);

        if ($work):
            if ((!(empty($work->image))) && (file_exists($work->image))):
                unlink($work->image);
            endif;
            
            $work->delete();
            $tagsWorks->delete();
        endif;

        return Redirect('admin/works')
                ->with('alert_success', 'Work supprimé.');
    }

    /**
     * Affiche le formulaire de création d'un work
     * 
     * @return view
     */
    public function create() {
        $tags = Tag::all();
        
        $resultats = array();

        foreach ($tags as $tag):
            $resultats[$tag->id] = $tag->name;
        endforeach;
        
        return View('works.admin.create', [
                        'tags' => $resultats
                    ]);
    }

    /**
     * Enregistre le work créé
     * 
     * @param Request $request données du formulaire
     * @return redirect redirection vers la liste des works
     */
    public function store(Request $request) {
        $inputs = $request->all();

        $rules = array(
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'client' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        );

        $validation = Validator::make($inputs, $rules);

        if ($validation->fails()):
            return Redirect('admin/works/create')
                            ->withInput()
                            ->withErrors($validation)
                            ->with('alert_error', 'Veuillez corriger les erreurs.');
        endif;



        if ($request->file('image')):
            $img = date('ymdHis') . '.' . $request
                    ->file('image')
                    ->getClientOriginalExtension();
        
            $request
                    ->file('image')
                    ->move('img/portfolio/', $img);
        endif;

        $work = Work::create(array(
                    'name' => e($request->get('name')),
                    'slug' => e($request->get('slug')),
                    'description' => e($request->get('description')),
                    'client' => e($request->get('client')),
                    'image' => 'img/portfolio/' . $img
        ));

        if (!$work):
            return Redirect('admin/works/create')
                    ->withInput()
                    ->with('alert_error', 'Un problème est survenue avec la sauvegarde');
        endif;

        return Redirect('admin/works')
                ->with('alert_success', 'Votre work a bien été ajouté.');
    }

}
