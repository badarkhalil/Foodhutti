<?php

namespace App\Http\Controllers;

use App\Models\Subchildcategory;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

class SubchildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagorylist = Subchildcategory::all();

       return view('subchildcategory/subchildcategories',compact('catagorylist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subchild = DB::table('subcategories')->get();

        return view('subchildcategory.addsubchildcategories',compact('subchild'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subchildcategory_name' => 'required',

         ]);
         // Subcategory::create($request->all());
         $model = new Subchildcategory();
         $model->subcategory_id = $request->post('subcategory_id');
         $model->subchildcategory_name = $request->post('subchildcategory_name');
         $model->save();

         $request->session()->flash('message', 'Category was successfully added!');

         return redirect('subchildcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subchildcategory  $subchildcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subchildcategory $subchildcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subchildcategory  $subchildcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Subchildcategory::find($id);
        $data = Subcategory::all();

      //  $sub  = ["id"=>$id];
        return view('subchildcategory.updatesubchildcategory',compact('data','sub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subchildcategory  $subchildcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'subchildcategory_name' => 'required',
        ]);
              $data=Subchildcategory::find($request->get('id'));
              $data->subchildcategory_name=$request->get('subchildcategory_name');

              $data->save();
              return redirect('subchildcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subchildcategory  $subchildcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $model = Subcategory::find($id);
        $model->delete();
        $request->session()->flash('message','category successfully deleted');
         return redirect('subcategories');
    }
}
