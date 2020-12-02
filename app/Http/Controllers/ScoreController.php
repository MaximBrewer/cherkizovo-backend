<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function patch(Request $request)
    {
        $score = \App\Models\Score::firstOrCreate([
            'user_id' => (string)$request->user_id,
            'avatar' => (string)$request->avatar,
            'name' => (string)$request->name,
            'score' => (string)$request->score,
        ]);
        event(new \App\Events\Refresh($score));
        return $score;
    }
}
