<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Consumption;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\Customer;

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
        $customers = Customer::count();
        $consumption = Consumption::sum('consumption');
        $bills = Bill::sum('amount');
        $payments = Payment::sum('amount');
        $consumptionGroup=Consumption::select(DB::raw('MONTH(created_at) as monthNum'), DB::raw('SUM(consumption) as consumption'))->groupBy('monthNum')->get();
        $billGroup=Bill::select(DB::raw('MONTH(created_at) as monthNum'), DB::raw('SUM(amount) as amount'))->groupBy('monthNum')->get();
        return view('home', compact('customers', 'bills', 'payments', 'consumption', 'consumptionGroup','billGroup'));
    }
}
