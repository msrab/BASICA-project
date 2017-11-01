<?php
/**
 * app/Post.php
 * Entité Post
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Post
 */
class Post extends Model
{
    protected $quarded = array('id');
    
    protected $fillable = [
        'slug',
        'title',
        'text',
        'image',
        'category_id'
    ];
    
    /**
     * Récupère la catégorie de ce post
     * @return category la catégorie
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
