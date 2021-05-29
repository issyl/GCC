<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'team_id' => ['required', 'string', 'max:255'],
            'game_id' => ['required', 'string', 'max:255'],
            'region_id' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'prize' => ['required', 'string', 'max:255'],
        ];
    }
}
