<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::all();

        return view('admin.category')->with('data', $data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|min:5',
        ]);

        if(!$validator->fails()) {
            $category = new category();
            $category->name = $request->name;
            $category->save();
        }
        else{
            return redirect('Admin/Category/Insert')->withErrors($validator->errors());
        }
//        $data = category::all();
//        return view('admin.category')->with('data', $data);
        return redirect('/Admin/Category');
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
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|min:5',
        ]);

        if(!$validator->fails()) {
            $category = category::find($id);
            $category->name = $request->name;
            $category->save();
        }
        else{
            return redirect("Admin/Category/Update/$id")->withErrors($validator->errors());
        }
        return redirect('/Admin/Category');
    }

    public function updatePage($id){
        $data = category::find($id);
        return view('admin.categoryupdate')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('/Admin/Category');
    }
}
