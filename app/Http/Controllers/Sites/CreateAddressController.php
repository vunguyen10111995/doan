<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Address;

class CreateAddressController extends Controller
{
    public function viewAdress($id) {

        $service = Service::with('address')->find($id);

        return view('sites._component.view_detail_address', compact('service'));
    }

    public function show($id)
    {
        $service = Service::with('address')->find($id);

        return view('sites._component.create_address', compact(
            'service'
        ));
    }

    public function store(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->sale_from = $request->start_at;
        $service->sale_end = $request->end_at;
        $service->sale_percent = $request->sale_percent;
        $service->description = $request->description;
        $service->save();
        try {
            $num = $request->number_services;
            for ($i = 0; $i < $num; $i++) {
                $address = new Address();
                $address->service_id = $id;
                $address->name_address = $request->title_address[$i];
                $address->description = $request->des[$i];
                $address->telephone = $request->telephone[$i];
                $address->save();
            }

            return redirect(route('user.view.address', $id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
