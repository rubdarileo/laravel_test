<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comments = \App\Models\Comment::where('product_id',$id)->get();
        
        return view('comments.index', ['comments' => $comments, 'product' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('comments.create',['product' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[ 'description'=>'required']);
        
        \App\Models\Comment::create($request->all());
        $comments = \App\Models\Comment::where('product_id',$id)->get();
        return view('comments.index', ['product' => $id, 'comments'=>$comments]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $comment_id)
    {
        $comment= \App\Models\Comment::find($comment_id);
        return  view('comments.show',['comment' => $comment, 'product' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $comment_id)
    {
        $this->validate($request,[ 'description'=>'required']);
        
        \App\Models\Comment::find($comment_id)->update($request->all());
        $comments = \App\Models\Comment::where('product_id',$id)->get();
        return view('comments.index', ['product' => $id, 'comments'=>$comments]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $comment_id)
    {
        \App\Models\Comment::find($comment_id)->delete();
        $comments = \App\Models\Comment::where('product_id',$id)->get();
        return view('comments.index', ['product' => $id, 'comments'=>$comments]);
    }
}
