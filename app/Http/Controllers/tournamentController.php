<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Requests\TournamentRequest;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tournament = Tournament::select('tournaments.*', 'games.game', 'regions.region', 'players.team')->join('games', 'tournaments.game_id', '=', 'games.id')
            ->join('regions', 'tournaments.region_id', '=', 'regions.id')->join('players', 'tournaments.team_id', '=', 'players.id')
            ->get();

        return view('tournaments.index', [
            'tournaments' => $tournament
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TournamentRequest $request)
    {
        Tournament::create([
            'tournament' => $request->tournament,
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
        return view('tournaments.edit', [
            'item' => $tournament
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
