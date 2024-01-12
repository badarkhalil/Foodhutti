<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Post::all();
        return view('post.posts',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('subcategories')->get();
        return view('post.addpost',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;

            $request->validate([
            'post_title' => 'required',
            'post_text' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('assets/images/blog'), $imageName);

        $model = new Post();
        $model->subcategory_id = $request->post('subcategory_id');
        $model->title = $request->post('post_title');
        $model->post_text = $request->post('post_text');
        $model->file = $imageName;
        $model->save();
        return redirect('post');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $data = Subcategory::all();

        return view('post.updatepost',compact('data','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

return $request;
        $request->validate([
            'post_title' => 'required',
            'post_text' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);



        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('assets/images/blog'), $imageName);

        $model = Post::find($request->get('id'));
        $model->subcategory_id = $request->get('subcategory_id');
        $model->title = $request->get('post_title');
        $model->post_text = $request->get('post_text');
        $model->file = $imageName;
        $model->save();
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data = Post::find($id);
        $data->delete();
        $request->session()->flash('message','post successfully deleted');
        return redirect('post');
    }

    public function deleteimage($id)
    {
        $data = Post::find($id);
        $data->delete();
        return back();
    }


}
