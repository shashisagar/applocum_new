<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Bouncer;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        if (Gate::allows('administration', auth()->user()) || Gate::allows('usermanager', auth()->user()) ) {
            return view('customer');
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

    public function customerList(){
        $data = Customer::select('*');
        return DataTables::of($data)
            ->addColumn('created_at', function ($data) {
                return $data->created_at->format('d/m/yy');
            })
            ->make(true);
    }




}
