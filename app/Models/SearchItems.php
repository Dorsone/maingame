<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 09.10.2020 3:44
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchItems extends Model
{
    protected $table = 'search_items';

    protected $fillable = ['article_id', 'title', 'url', 'description', 'breadcrumbs'];

    public function searchIndex()
    {
        return $this->hasMany(Search::class, 'items_id', 'id');
    }
}
