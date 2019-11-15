<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.viewcategories')->with('catKey', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categorytitle' => 'required|max:30'
        ]);

        $categories = new Category();
        $categories->categoryname = $request->categorytitle;
        $categories->save();

        Session::flash('success', "Data Saved Successfully");
        // dd($request->all());
        return redirect()->route('category.index');  
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
        $editCat = Category::find($id);

        return view('admin.categories.edit')->with('editCat', $editCat);
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
       $this->validate($request, [
            'categorytitle' => 'required|max:30'
        ]);
        $catUpdate = Category::find($id);
        $catUpdate->categoryname = $request->categorytitle;
        $catUpdate->save();

        Session::flash('success', "Data Updated Successfully");

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $catDelete = Category::find($id);

        $catDelete->delete();
        Session::flash('success', "Data Deleted Successfully");
        return redirect()->route('category.index');
    }
}
