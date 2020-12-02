<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function store(Request $request)
    {

        $score = \App\Models\Score::where('user_id', (string)$request->user_id)->first();
        if (!$score) {
            \App\Models\Score::firstOrCreate([
                'user_id' => (string)$request->user_id,
                'avatar' => (string)$request->avatar,
                'name' => (string)$request->name,
                'score' => (string)$request->score,
            ]);
        } elseif ($score->score < (string)$request->score) {
            $score->update(['score' => (string)$request->score]);
        }
        event(new \App\Events\Refresh($score));
        return $score;
    }
    //
    public function get(Request $request)
    {
        $scores = \App\Models\Score::orderBy('score', 'desc')->limit(50)->get();
        return $scores;
    }
}
