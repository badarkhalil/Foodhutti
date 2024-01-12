<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagorylist = Subcategory::all();

       return view('subcategory/subcategories',compact('catagorylist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result['category'] = DB::table('categories')->get();

        return view('subcategory.addsubcategories',$result);
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
           'subcategory_name' => 'required',

        ]);
        // Subcategory::create($request->all());
        $model = new Subcategory();
        $model->category_id = $request->post('category_id');
        $model->subcategory_name = $request->post('subcategory_name');
        $model->save();

        $request->session()->flash('message', 'Category was successfully added!');

        return redirect('subcategories');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Subcategory::find($id);
        $data = Category::all();

      //  $sub  = ["id"=>$id];
        return view('subcategory.updatesubcategory',compact('data','sub'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
              $data=Subcategory::find($request->get('id'));
              $data->category_name=$request->get('category_name');

              $data->save();
              return redirect('subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
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
