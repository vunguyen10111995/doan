<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Address;
use App\Models\Category;
use Carbon\Carbon;

class ServiceTypeController extends Controller
{
    public function showTopSale()
    {
        $lastWeek = Carbon::now()->subWeek();

        $services = Service::orderBy('sale_percent', 'DESC')
            ->whereBetween('created_at', [$lastWeek, Carbon::now()])->paginate(9);

        $total_service = count(Service::all());

        $total_address = count(Address::all());

        $total_category = count(Category::all());

        return view('sites._component.top_sales', compact('services', 'total_service', 'total_address', 'total_category'));
    }

    public function showFoodAndDrink()
    {
        $services = Service::where('category_id', 1)->paginate(9);

        $total_service = count(Service::all());

        $total_address = count(Address::all());

        $total_category = count(Category::all());

        return view('sites._component.food_drink', compact('services', 'total_service', 'total_address', 'total_category'));
    }

    public function showClothes()
    {
        $services = Service::where('category_id', 2)->paginate(9);

        $total_service = count(Service::all());

        $total_address = count(Address::all());

        $total_category = count(Category::all());

        return view('sites._component.clothes', compact('services', 'total_service', 'total_address', 'total_category'));
    }

    public function showBeauty()
    {
        $services = Service::where('category_id', 3)->paginate(9);

        $total_service = count(Service::all());

        $total_address = count(Address::all());

        $total_category = count(Category::all());

        return view('sites._component.beauty', compact('services', 'total_service', 'total_address', 'total_category'));
    }
}
