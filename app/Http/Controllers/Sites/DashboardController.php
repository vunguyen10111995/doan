<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;
use App\Models\Follow;
use App\Models\Category;
use App\Models\Service;
use App\Models\Address;
use App\Models\User;

class DashboardController extends Controller
{
    public function show($id)
    {
        try {
            $userFollowings = User::whereFollowing($id)->followingUsers->keyby('follower');
            $userFollowers = User::whereFollower($id)->followerUsers;
            $following = count($userFollowers);
            $follower = count($userFollowings);
            $user = User::find($id);
            $numberServices = Service::whereUser($user->id)->get();
            $services = Service::OrderBy('created_at', 'desc')->whereUser($user->id)->get();
            $numberService = count($numberServices);
            $checkFollow = Follow::where('following_id', $id)->where('follower_id', Auth::user()->id)->first();

            return view('sites._component.dashboard', compact(
                'services',
                'numberServices',
                'numberService',
                'following',
                'follower',
                'user',
                'userFollowings',
                'userFollowers',
                'checkFollow'
            ));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
