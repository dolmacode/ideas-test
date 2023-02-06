<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Like;
use Cookie;
use Illuminate\Support\Str;

class LikeController extends Controller
{
    public function __invoke($id) {
        $user_id = "";

        $like = Like::where([
            'idea_id' => $id,
            'user_id' => $user_id,
        ])->get();

        if (!isset($like->id)) {
            $user_id = Str::random(64);

            Cookie::queue('uid', $user_id);

            Like::create([
                'idea_id' => $id,
                'user_id' => $user_id,
            ]);

            Idea::find($id)->increment('favs');
        } else {
            $user_id = $request->cookie('uid');

            if (!empty($user_id)) {

                if (!empty($like)) {
                    Like::destroy($like->id);
                }
            }
        }

        return redirect('/');
    }
}
