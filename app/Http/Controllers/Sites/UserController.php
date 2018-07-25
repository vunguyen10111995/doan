<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\sites\PasswordRequest;
use App\Http\Requests\sites\MailRequest;
use App\Http\Requests\sites\ProfileRequest;
use App\Helpers\helper;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('sites._component.profile');
    }

    public function setting()
    {
        return view('sites._component.account_setting');
    }

    public function changeAvatar(Request $request, $id)
    {
        $changeAvatar = User::findOrFail($id);
        try {
            $filename = helper::upload($request->file('avatar'), config('setting.defaultPath'));
            $changeAvatar->avatar = $filename;
            $changeAvatar->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function changePassword(PasswordRequest $request, $id)
    {
        $changePassword = User::find($id);
        try {
            $changePassword->password = $request->password_register;
            $changePassword->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function changeEmail(MailRequest $request, $id)
    {
        $changeEmail = User::find($id);
        try {
            $changeEmail->email = $request->new_email;
            $changeEmail->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }

        return redirect('profile');
    }

    public function updateProfile(ProfileRequest $request, $id)
    {
        $updateProfile = User::find($id);
        try {
            $filename = helper::upload($request->file('avatar'), config('setting.defaultPath'));
            $updateProfile->avatar = $filename;
            $updateProfile->full_name = $request->full_name;
            $updateProfile->address = $request->address;
            $updateProfile->gender = $request->gender;
            $updateProfile->save();
        } catch (Exception $e) {
            echo $e->get_message();
        }
        
        return redirect('profile');
    }
}
