<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function tournaments(): HasMany
    {
        return $this->hasMany(Tournament::class, 'game_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function pull_items(): HasMany
    {
        return $this->hasMany(PullItem::class, 'game_id', 'id');
    }
}
