<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\sites\ServicesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\helper;
use App\Models\Service;
use App\Models\Province;
use App\Models\Category;
use App\Notifications\ServiceCreated;

class RequestServicesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('sites._component.request_services', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $servicesRequest = new Service();
            $filename = helper::importFile($request->file('image'), config('setting.requestPath'));
            $servicesRequest->image = config('setting.requestPath') . $filename;
            $servicesRequest->category_id = $request->category_id;
            $servicesRequest->title = $request->title;
            $servicesRequest->sale_from = $request->sale_from;
            $servicesRequest->sale_end = $request->sale_end;
            $servicesRequest->description = $request->description;
            $servicesRequest->note = $request->note;
            $servicesRequest->sale_percent = $request->sale_percent;
            $servicesRequest->url = $request->url;
            $servicesRequest->user_id = Auth::user()->id;
            $servicesRequest->url = $request->url;
            $servicesRequest->status = 'pending';
            $servicesRequest->save();

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
