<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $models = Order::where('id','=',1)->first();
            $updated_at = Carbon::now()->format('d/m/Y H:i:s');
            $attr = ['name'=>\Auth::user()->name,'description'=>'Login into the system by '.$updated_at];
            LogActivity::addToLog('Order Created',$models,$attr);
            return view('home');
    }
}
