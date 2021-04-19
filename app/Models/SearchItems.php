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

    protected $fillable = ['title', 'url', 'description', 'breadcrumbs'];
}
