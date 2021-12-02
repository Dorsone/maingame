<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return BelongsToMany
     */
    public function tournaments(): BelongsToMany
    {
        return $this->belongsToMany(
            Tournament::class,
            'team_tournaments',
            'tournament_id',
            'team_id'
        )->withPivot(['is_winner', 'group']);
    }

    /**
     * @return BelongsToMany
     */
    public function match(): BelongsToMany
    {
        return $this->belongsToMany(
            Match::class,
            'match_details',
            'match_id',
            'team_id'
        )->withPivot('is_winner');
    }

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(TeamUser::class, 'team_id', 'id');
    }
}
