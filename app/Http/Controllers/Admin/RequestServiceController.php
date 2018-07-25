<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestService;
use App\Models\Province;
use App\Models\User;
use App\Helpers\helper;
use App\Models\Service;

class RequestServiceController extends Controller
{
    public function index(Request $request)
    {
        $provinces = Province::all();
        $request_services = RequestService::paginate(5);
        if ($request->ajax()) {
            return view('admin._component.request_service.paginate_request_service', compact('request_services', 'provinces'))->render();
        }

        return view('admin._component.request_service.manage_request_service', compact('request_services', 'provinces'));
    }

    public function update(Request $request)
    {
        $request_service = RequestService::findOrFail($request->id);
        $request_service->status = $request->status;
        $request_service->save();
        $html = view('admin._component.request_service.update_status', compact('request_service'));
        if($request->status == 1) {
            $data = [
                'province_id' => $request_service['province_id'],
                'category_id' => $request_service['category_id'],
                'name' => $request_service['name'],
                'image' => $request_service['image'],
                'price' => $request_service['price'],
            ];
            $service = Service::create($data);
        }

        return response($html);
    }

    public function search(Request $request)
    {
        $key = $request->key;

        $request_services = RequestService::search($key)->get();
        
        $result = view('admin._component.request_service.search', compact('request_services'));

        return response($result);
    }

    public function filter(Request $request)
    {
        $province_id = $request->province_id;
        $request_services = RequestService::where('province_id', '=', $province_id)->get();
        $view = view('admin._component.request_service.search', compact('request_services'))->render();

        return response($view);
    }

    public function showData(Request $request)
    {   
        $response = Helper::messageException();
        try {
            $request_service = RequestService::with(['category', 'province', 'user'])->find($request->id);
            $response['data'] = $request_service;

            return response()->json($response);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response); 
        }
    }
}
