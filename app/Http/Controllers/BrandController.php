<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
Use \Carbon\Carbon;

class BrandController extends Controller
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
       $brands = Brand::orderBy('created_at','desc')->get();
        return view('brand.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->entry_date = Carbon::now();;  
        $brand->save();
        return redirect()->back()->with('success', ' Brand has been added successfully');  
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
    public function update(Request $request)
    {
        $edit_brand = Brand::where('id',$request->ebrandid)->first();
        $edit_brand->name = $request->editname;
        $edit_brand->entry_date = Carbon::now();  
        $edit_brand->save();
        return redirect()->back()->with('success', ' Brand has been Updaetd successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $data = Brand::findOrFail($id);
        $data->delete($data);
        return redirect()->back()->with('success', ' Brand will be deleted successfully');  
    }

    public function check(Request $request)
    {
        if($request->get('name'))
        {
            $name = $request->get('name');
            return $brand = Brand::where('name',$name)->count();
           
        }
    }
}
