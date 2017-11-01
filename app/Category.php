<?php
/**
 * app/Category
 * Entité Category
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Category
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
    
    /**
     * Récupère tous les posts qui ont cette catégorie
     * 
     * @return posts la liste des posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
