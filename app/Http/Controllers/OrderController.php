<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('administration', auth()->user()) || Gate::allows('shopmanager', auth()->user()) ) {
            return view('order');
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

        $name=Order::select('customers.name')->join('customers','customers.id','=','orders.customer_id')
                                            ->where('orders.id','=',$id)->first();

        $data=OrderItem::select('products.*')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->where('order_items.order_id','=',$id)->get();
   
       return view('product-details',get_defined_vars());  
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

    public function orderList(){


        $data=Order::select('orders.*','customers.name')->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('order_items', 'order_items.order_id', '=', 'orders.id');
         return DataTables::of($data)
         ->addColumn('action', function ($data) {
             return '<a target="_" href="/order/'.$data->id.'" class="btn-primary">Show</a>';
            
         })
         ->addColumn('created_at', function ($data) {
            return $data->created_at->format('d/m/yy');
        })
         ->rawColumns(['action','created_at'])
         ->make(true);
    }

}
