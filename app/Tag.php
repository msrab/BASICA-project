<?php
/**
 * app/Tag.php
 * Entité Tag
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Tag
 */
class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
    
    /**
     * Récupère la liste des works correspondant à ce tag
     * @return works la liste des works
     */
    public function works()
    {
        return $this->belongsToMany('App\Work');
    }
}
