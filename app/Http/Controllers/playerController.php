<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $player = Players::paginate(10);

        return view('players.index', [
            'player' => $player
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlayerRequest $request)
    {
        Players::create([
            'name' => $request->name,
            'team' => $request->team,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('players.index');
    }

    public function createPlayer(PlayerRequest $request)
    {
        dd($request);
        Players::create([
            'name' => $request->name,
            'team' => $request->team,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Players $player)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Players $player)
    {
        return view('players.edit', [
            'item' => $player
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Players $player)
    {
        $data = $request->all();

        // if ($request->file('profile_photo_paths')) {
        //     $data['profile_photo_path'] = $request->file('profile_photo_path')->store('assets/player', 'public');
        // }

        $player->update($data);

        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Players $player)
    {
        $player->delete();

        return redirect()->route('players.index');
    }
}
