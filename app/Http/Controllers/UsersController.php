<?php
/**
 * app/Http/Controllers/UsersController.php
 * Controller des users
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * class UsersController
 */
class UsersController extends Controller 
{
    /**
     * Déconnection 
     * @return redirect redirection vers la page d'accueil du site
     */
    public function logout()
    {
        Auth::logout();
        return Redirect()->route('home');
    }

}
