<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Players;
use App\Models\Game;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\TournamentRequest;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tournament = Tournament::select('tournaments.*', 'games.game', 'regions.region', 'players.team')
            ->join('games', 'tournaments.game_id', '=', 'games.id')
            ->join('regions', 'tournaments.region_id', '=', 'regions.id')
            ->join('players', 'tournaments.team_id', '=', 'players.id')
            ->paginate(10);

        return view('tournaments.index', [
            'tournament' => $tournament
        ]);
    }

    public function client()
    {
        $tournament = DB::table('tournaments')
            ->join('regions', 'tournaments.region_id', '=', 'regions.id')
            ->join('players', 'tournaments.team_id', '=', 'players.id')
            ->join('games', 'tournaments.game_id', '=', 'games.id')
            ->select('tournaments.*', 'games.game', 'regions.region', 'players.team')
            ->where('tournaments.status', '=', 'ON GOING')
            ->get();

        return $tournament->toJson();
    }

    public function finished()
    {
        $tournament = DB::table('tournaments')
            ->join('regions', 'tournaments.region_id', '=', 'regions.id')
            ->join('players', 'tournaments.team_id', '=', 'players.id')
            ->join('games', 'tournaments.game_id', '=', 'games.id')
            ->select('tournaments.*', 'games.game', 'regions.region', 'players.team')
            ->where('tournaments.status', '=', 'finished')
            ->get();

        return $tournament->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tournament = DB::table('tournaments')
            ->join('regions', 'tournaments.region_id', '=', 'regions.id')
            ->join('players', 'tournaments.team_id', '=', 'players.id')
            ->join('games', 'tournaments.game_id', '=', 'games.id')
            ->select('tournaments.*', 'games.game', 'regions.region', 'players.team')
            ->get();

        $player = Players::all();
        $game = Game::all();
        $region = Region::all();
        return view('tournaments.create', [
            'tournament' => $tournament,
            'team' => $player,
            'game' => $game,
            'region' => $region
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // dd($request)->team_id;
        Tournament::create([
            // 'tournaments' => $request->tournament,
            'name' => $request->name,
            'team_id' => $request->team_id,
            'game_id' => $request->game_id,
            'region_id' => $request->region_id,
            'date' => $request->date,
            'status' => $request->status,
            'prize' => $request->prize,
        ]);

        return redirect()->route('tournaments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Tournament $tournament)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Tournament $tournament)
    {

        $player = Players::all();
        $game = Game::all();
        $region = Region::all();
        return view('tournaments.edit', [
            'tournament' => $tournament,
            'team' => $player,
            'game' => $game,
            'region' => $region
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tournament $tournament)
    {
        // dd($request);
        $data = $request->all();

        // if ($request->file('profile_photo_paths')) {
        //     $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/tournament', 'public');
        // }

        $tournament->update($data);

        return redirect()->route('tournaments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index');
    }
}
