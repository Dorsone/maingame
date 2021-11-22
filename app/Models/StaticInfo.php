<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class StaticInfo extends Model
{
    use CrudTrait, HasFactory, Sluggable;

    protected $table = 'static_infos';
    protected $guarded = ['id'];
    protected $dates = ['date'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
