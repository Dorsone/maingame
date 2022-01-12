<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class TournamentService
 * @package App\Services
 */
class TournamentService
{
    /**
     * @param Game $game
     * @return LengthAwarePaginator
     */
    public function activeTournaments(Game $game)
    {
        $active_tournaments = QueryBuilder::for(Tournament::class)
            ->byMatchFormat()
            ->where("tournaments.game_id", $game->id)
            ->where("tournaments.is_finished", false)
            ->orderByDesc("tournaments.id")
            ->paginate(4)
            ->withQueryString();
        return $active_tournaments;
    }

    /**
     * @param Game $game
     * @return LengthAwarePaginator
     */
    public function finishedTournaments(Game $game)
    {
        $finished_tournaments = QueryBuilder::for(Tournament::class)
            ->byMatchFormat()
            ->where("tournaments.game_id", $game->id)
            ->where("tournaments.is_finished", true)
            ->orderByDesc("tournaments.id")
            ->paginate(4)
            ->withQueryString();
        return $finished_tournaments;
    }

    /**
     * @param Game $game
     * @return Builder[]|Collection
     */
    public function topTournaments(Game $game)
    {
        $top_tournaments = Tournament::query()
            ->where("game_id", $game->id)
            ->where("is_finished", false)
            ->orderByDesc("id")
            ->take(3)->get();
        return $top_tournaments;
    }
}