<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 09.10.2020 3:44
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search_index';

    protected $fillable = ['items_id', 'weight', 'text', 'need_delete'];
}
