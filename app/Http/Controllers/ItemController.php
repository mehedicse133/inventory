<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Brand;
use App\models\Models;
use App\models\Items;
Use \Carbon\Carbon;

class ItemController extends Controller
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
        $items = Items::leftjoin('brand','items.brand_id','=','brand.id')
                        ->leftjoin('models','items.model_id','=','models.id')
                        ->select('items.*', 'brand.name as brandName','models.name as modelName')
                        ->orderBy('entry_date','desc')->get();
        // return $items;
        return view('item.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Items;
        $item->brand_id = $request->brand_id;
        $item->model_id = $request->model_id;
        $item->name = $request->name;
        $item->entry_date = Carbon::now();  
        $item->save();
        return redirect()->back()->with('success', ' Item has been added successfully');
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
    public function update(Request $request, $id=null)
    {
        $edit_item = Items::where('id',$request->eitem_id)->first();
        $edit_item->brand_id = $request->brand_id;
        $edit_item->model_id = $request->model_id;
        $edit_item->name = $request->name;
        $edit_item->entry_date = Carbon::now();  
        $edit_item->save();
        return redirect()->back()->with('success', ' Item has been Updaetd successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
        $data = Items::findOrFail($id);
        $data->delete($data);
        return redirect()->back()->with('success', '  Item will be deleted successfully'); 
    }

    public function check(Request $request)
    {
        $brand_id = $request->get('brand_id');  
        $model_id = $request->get('model_id');  
        $name = $request->get('name');
        return $item = Items::where('items.name',$name)
                            ->count();
                            
    }
}
