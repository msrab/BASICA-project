<?php
/**
 * app/Article.php
 * Entité Article
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * class Article
 */
 
 /* La classe Article */
class Article extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'text',
        'image',
        'slide'
    ];
}
