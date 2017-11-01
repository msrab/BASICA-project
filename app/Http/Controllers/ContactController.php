<?php
/**
 * app/Http/Controllers/ContactController
 * Controller de contact
 */

namespace App\Http\Controllers;

use Mapper;

/**
 * class ContactController
 */
class ContactController extends Controller
{


    /**
     * Affiche une google map
     * 
     * @return view
     */
    public function index()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);
        
        return View('contact.index');
    }
    
}
