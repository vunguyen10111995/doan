<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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
        try {
            $comment = new Comment();
            $comment->service_id = $request->service_id;
            $comment->user_id = Auth::user()->id;
            $content = $request->content;
            $comment->content = $content;
            $comment->save();
            $service_id = $request->service_id;
            $time = Comment::all()->pluck('created_at')->last();

            return response(view('sites._component.show_comment', compact('content', 'time', 'comment', 'service_id'))->render());
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
        //
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
            $comment = Comment::find($id);
            $comment->content = $request->content;
            $content = $request->content;
            $comment->service_id = $request->service_id;
            $comment->user_id = Auth::user()->id;
            $comment->save();
            $service_id = $request->service_id;
            $time = Comment::find($id)->pluck('updated_at')->last();
            
            return response(view('sites._component.show_comment', compact('content', 'time', 'comment', 'service_id'))->render());
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
        try {
            $comment = Comment::find($id);
            $comment->delete();
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
}
