<?php
/**
 * app/Work.php
 * Entité Work
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Work
 */
class Work extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'client',
        'image'
    ];
    
    /**
     * Récupère tous les tags correspondant à ce work
     * @return tags la liste des tags
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
