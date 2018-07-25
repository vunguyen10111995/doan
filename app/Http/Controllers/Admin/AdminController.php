<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\helper;
use App\Models\Category;
use App\Models\Service;
use App\Models\Address;
use App\Http\Requests\admin\ProfileAdmin;
use App\Http\Requests\admin\ChangePassword;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);
        if ($request->ajax()) {
            return view('admin._component.user.paginate_user', compact('users'))->render();
        }

        return view('admin._component.user.manage_user', compact('users'));
    }

    public function dashboard()
    {
        
        $numberCategory = count(Category::all());
        $numberService = count(Service::all());
        $numberAddress = count(Address::all());

        return view('admin._component.index', compact(
            'numberService', 'numberCategory', 'numberAddress'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png',
            'full_name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'min:6|required',
            'repassword' => 'same:password|min:6|required',
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'gender' => $request->gender,
            'admin_access' => $request->level,
            'username' => $request->username,
            'phone' => $request->phone,
            'avatar' => helper::upload($request->file('avatar'), config('setting.defaultPath'))
        ]);

        $html = view('admin._component.user.result_add_user', compact('user'))->render();
            
        return response($html);
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

    public function showData(Request $request)
    {
        try {
            $user = User::find($request->id);

            return response()->json($user);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function updateLevel(Request $request)
    {   
        try {
            $user = User::find($request->id);
            $user->admin_access = $request->level;
            $user->save();

            $html = view('admin._component.user.update_level', compact('user'))->render();
            
            return response($html);
        } catch (Exception $e) {
            echo $e->get_message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $admin = User::find($request->id);
            $admin->full_name = $request->full_name;
            $admin->email = $request->email;
            $admin->address = $request->address;
            $admin->gender = $request->gender;
            $admin->phone = $request->phone;
            if ($request->hasFile('avatar')) {
                $file_name = helper::upload($request->file('avatar'), config('setting.defaultPath'));
                $admin->avatar = $file_name;
            }
            $admin->save();
            
            return response()->json($admin);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function search(Request $request)
    {   
        try {
            $key = $request->key;
            $users = User::where('full_name', 'like', '%'. $key .'%')
                ->orWhere('username', 'like', '%'. $key .'%')
                ->orWhere('email', 'like', '%'. $key .'%')->get();
            $html = view('admin._component.user.search', compact('users'))->render();

            return response($html);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function filter(Request $request) {
        $level = $request->level;
        $users = User::where('admin_access', '=', $level)->get();
        $view = view('admin._component.user.search', compact('users'))->render();

        return response($view);
    }

    public function getPassword($id)
    {
        $user = User::find($id);

        return view('admin._component.user.password', compact('user'));
    }

    public function changePassWord(ChangePassword $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->password = $request->new_password;
            $user->save();
            
            return redirect()->back()->with('message', 'UpdateSuccessfully');
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
