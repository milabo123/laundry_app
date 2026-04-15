<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\TransOrder;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // total pelanggan/customer yagn ada
        $totalPelanggan = Customer::count();

        // total orderan hari in
        $totalOrderHariIni = TransOrder::whereDate('order_date', Carbon::today())->count();

        // pendaotan yang masuk hari ini
        $pendapatanHariIni = TransOrder::whereDate('order_date', Carbon::today())->sum('total');

        return view('admin.dashboard', compact('totalPelanggan', 'totalOrderHariIni', 'pendapatanHariIni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
