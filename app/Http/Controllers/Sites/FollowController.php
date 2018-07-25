<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request, $id)
    {
        if ($request->ajax()) {
            $follow =  new Follow();
            $follow->follower_id = Auth::user()->id;
            $follow->following_id = $id;
            $follow->save();

            return response(view('sites._component.follow.follow_result', compact('follow'))->render());
        }
    }

    public function unfollow(Request $request, $id)
    {
        if ($request->ajax()) {
            $follow =  Follow::whereFollow(Auth::user()->id, $id);
            $follow->delete();
            $user = User::find($id);

            return response(view('sites._component.follow.unfollow_result', compact('user'))->render());
        }
    }
}
