<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Auth;
use App\Helpers\helper;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailService;

class ServiceController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $services = Service::orderBy('created_at', 'desc')->paginate(10);

        if($request->ajax()) {
            return view('admin._component.service.paginate_service', compact('services'))->render();
        }

        return view('admin._component.service.manage_service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            $data = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'rate_average' => 0,
            'rate_count' => 0,
            'price' => 500,
            'status' => 0,
        ];
        
            $plan = Plan::create($data);
            $provinces = is_array($request->province) ? $request->province : [];
            foreach ($provinces as $province) {
                    $plan_province = new PlanProvince();
                    $plan_province->province_id = $province;
                    $plan_province->plan_id = $plan['id'];
                    $plan_province->save();
                }
            $result = view('admin._component.plan.update_status', compact('plan'));

            return response($result);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $service = Service::with('address')->find($id);

        return view('admin._component.service.view', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $plan = Plan::findOrFail($id);
        
            return view('admin._component.schedule.edit', compact('plan'));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        try {
            $service = Service::findOrFail($request->id);
            $service->status = $request->status;
            $service->save();

            $mail = new MailService($service, Auth::user());
            Mail::to(Auth::user()->email)->send($mail);
            $result = view('admin._component.service.update_status', compact('service'));
            
            return response($result);
            
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
        //
    }

    public function filter(Request $request)
    {
        try {
            $status = $request->key;
            $services = Service::where('status', '=', $status)->get();
            $view = view('admin._component.service.search', compact('services'))->render();

            return response($view);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function search(Request $request)
    {
        try {
            $key = $request->key;

            $services = Service::where('title', 'LIKE', '%'.$key.'%')->get();
            
            $result = view('admin._component.service.search', compact('services'));

            return response($result);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function profile($id)
    {
        try {
            $admin = User::find($id);

            return view('admin._component.user.profile', compact('admin'));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
