<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;

class tournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $tournaments = Tournament::all();

    //     return $tournaments->toJson();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tournaments = Tournament::paginate(10);
        $tournaments = Tournament::join('games', 'tournaments.games_id', '=', 'games.id')
            ->join('servers', 'tournaments.server_id', '=', 'servers.id')
            ->select('tournament.*', 'games.game', 'servers.server')
            ->get();

        return view('tournaments.index', [
            'tournaments' => $tournaments
        ]);
    }

    public function katalog()
    {

        $katalog = Tournament::get();
        // $testi = Testimonial::get();
        return view('welcome', [
            'katalog' => $katalog,
            // 'testi' => $testi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // $data['picturePath'] = $request->file('picturePath')->store('assets/tournaments', 'public');

        Tournament::create($data);

        return redirect()->route('tournaments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournaments)
    {
        return view('tournaments.edit', [
            'item' => $tournaments
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournaments)
    {
        $data = $request->all();

        $tournaments->update($data);

        return redirect()->route('tournaments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournaments)
    {
        $tournaments->delete();
        return redirect()->route('tournaments.index');
    }
}
