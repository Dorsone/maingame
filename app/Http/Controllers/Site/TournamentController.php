<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\MatchFormat;
use App\Services\TournamentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class TournamentController
 * @package App\Http\Controllers\Site
 */
class TournamentController extends Controller
{
    /** @var TournamentService $tournamentService */
    private $tournamentService;

    /**
     * TournamentController constructor.
     * @param TournamentService $tournamentService
     */
    public function __construct(TournamentService $tournamentService)
    {
        $this->tournamentService = $tournamentService;
    }

    /**
     * Returns tournaments list view
     * @param Game $game
     * @return Factory|View
     */
    public function index(Game $game)
    {
        return view("gzone.pages.tournaments", [
            "game" => $game,
            "games" => Game::query()->get(),
            "match_formats" => MatchFormat::query()->get(),
            "top_tournaments" => $this->tournamentService->topTournaments($game),
            "active_tournaments" => $this->tournamentService->activeTournaments($game),
            "finished_tournaments" => $this->tournamentService->finishedTournaments($game),
        ]);
    }
}
