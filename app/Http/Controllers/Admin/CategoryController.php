<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(5);
        if($request->ajax()) {
            return view('admin._component.category.paginate_category', compact('categories'))->render();
        }

        return view('admin._component.category.manage_category', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];
        
        $category = Category::create($data);
        $html = view('admin._component.category.update', compact('category'))->render();
            
        return response($html);
    }

    public function update(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);
            $category->name = $request->name;
            $category->save();
            $html = view('admin._component.category.update', compact('category'))->render();
                
            return response($html);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id)->delete();
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $categories = Category::where('name', 'LIKE', '%'.$key.'%')->get();
        
        $result = view('admin._component.category.search', compact('categories'));

        return response($result);
    }

    public function show(Request $request)
    {
        $user = Category::find($request->id);

        return response()->json($user);
    }
}
