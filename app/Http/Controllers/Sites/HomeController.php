<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Address;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::OrderBy('created_at', 'desc')->where('status', 'approved')->paginate(12);

        $total_service = count(Service::where('status', 'approved')->get());

        $total_address = count(Address::all());

        $total_category = count(Category::all());

        return view('index', compact('services', 'total_service', 'total_address', 'total_category'));
    }
    
    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $services = Service::where('title', 'like', '%' . $keyword . '%')->get();
            $html = view('sites._component.search_result', compact('services'))->render();

            return response($html);
        }
    }
}
