<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at','DESC')->get()->take(10);
        $totalSales = Order::where('status','delivered')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('dashboard',[
            'orders' => $orders,
            'totalRevenue' => $totalRevenue,
            'totalSales' => $totalSales,
            'todayRevenue' => $todayRevenue,
            'todaySales' => $todaySales,
        ]);
    }
}
