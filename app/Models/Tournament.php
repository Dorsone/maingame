<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            Team::class,
            'team_tournaments',
            'team_id',
            'tournament_id'
        )->withPivot(['is_winner', 'group']);
    }

    /**
     * @return HasOne
     */
    public function game(): HasOne
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }

    /**
     * @return HasOne
     */
    public function format(): HasOne
    {
        return $this->hasOne(MatchFormat::class, 'id', 'match_format_id');
    }

    /**
     * @return BelongsToMany
     */
    public function pull_items(): BelongsToMany
    {
        return $this->belongsToMany(
            PullItem::class,
            'tournament_pull_items',
            'pull_item_id',
            'tournament_id'
        );
    }

    /**
     * @return HasMany
     */
    public function matches(): HasMany
    {
        return $this->hasMany(Match::class, 'tournament_id', 'id');
    }

}
