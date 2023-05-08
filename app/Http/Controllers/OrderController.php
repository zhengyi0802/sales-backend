<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Member;
use App\Models\User;
use App\Enums\UserRole;
use App\Enums\OrderFlow;
use App\Collections\SunTechPayment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $orders = Order::where('id', 0)->get();
        if ($data != null && $data['line_id'] != null) {
            $user = User::where('line_id', $data['line_id'])->first();
            $member = $user->member;
            $orders = Order::where('member_id', $member->id)->get();
        }
        return view('orders.index', compact('orders'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $pInfo = new SunTechPayment($order, 3500, 1);
        return view('orders.show', compact('order'))
               ->with(compact('pInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cancell(Order $order)
    {
        $order->flow_status = OrderFlow::Cancelled;
        $order->save();
        $line_id = $order->member->user->line_id;

        return redirect()->route('orders.index')
                         ->with('line_id', $line_id);
    }

}
