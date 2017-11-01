<?php
/**
 * app/Http/Controllers/HomeController.php
 * Controller de la page d'accueil
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Work;
use App\Post;

/**
 * class HomeController
 */
class HomeController extends Controller
{

    /**
     * Affiche la page d'accueil
     * On récupère les 3 derniers articles, les 6 derniers works et les 3 derniers posts
     * 
     * @return view
     */
    public function index()
    {
        $articles = Article::where('slide', '=', 1)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        
        $works = Work::orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        
        $posts = Post::orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        
        return View('home.index', [
            'articles' => $articles,
            'works' => $works,
            'posts' => $posts
        ]);
    }
    
    /**
     * Affiche le dashboard de l'administration
     * 
     * @return view
     */
    public function admin()
    {
        return View('home.admin.home')
                ->with('alert_success', 'Bonjour '.Auth::user()->name.'<br /> Bienvenue dans l\'administration du site.');
    }
}
