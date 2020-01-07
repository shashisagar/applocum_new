<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('administration', auth()->user()) || Gate::allows('shopmanager', auth()->user()) ) {
            return view('product');
        }
        else{
            return view('permission');
        }
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function productList(){
        $data = Product::select('*');
        return DataTables::of($data)
        ->addColumn('action', function ($data) {
            return '<input data-id="'.$data->id.'" class="toggle-class" type="checkbox"  '.($data->in_stock == '1' ? 'checked' : "").' >';
       
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function changeStatus(Request $request){
        $product = Product::find($request->product_id);
        $product->in_stock = $request->status;
        $product->save();
        return response()->json(['success'=>'Status change successfully.']);
    }


}
