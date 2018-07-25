<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Comment;
use App\Models\Address;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function serviceDetail($id)
    {
        $service = Service::with('comments', 'user', 'address')->findOrFail($id);

        $comments = Comment::getComment($id);

        $service_types = Service::where('category_id', $service->category_id)->limit(6)->get();

        $address = Address::whereService($id);

        return view('sites._component.service_detail', compact('service', 'comments', 'service_types', 'address'));
    }
}
