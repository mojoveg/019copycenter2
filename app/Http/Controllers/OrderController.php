<?php

namespace App\Http\Controllers;

use App\Order;
use App\Type;
use App\OrderOption;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $option_types = OptionType::all();
        // $types = Type::orderBy('sort_order', 'asc')->get();
        // return view('orders.create', compact('types'));

        return $this->create_edit(new Order());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'customer_name'=>'required',
        //     'number_of_copies'=>'required',
        //     'payment'=>'required'
        // ]);
        // $order = new Order([
        //     'customer_name' => $request->get('customer_name'),
        //     'number_of_copies' => $request->get('number_of_copies'),
        //     'payment' => $request->get('payment'),
        // ]);
        // $order->save();

        // $options = $request->get('options');
        // foreach ($options as $v) {
        //     foreach ($v as $option) {
        //         // validation?
        //         $orderOption = new OrderOption([
        //             'order_id' => $order->id,
        //             'option_id' => $option,
        //         ]);
        //         $orderOption->save();
        //     }
        // }


        // return redirect('/orders')->with('success', 'Order saved!');
        // return redirect(route('orders.index'))->with('success', 'Order saved!');

        return $this->update($request, new Order());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Order::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        // $types = Type::orderBy('sort_order', 'asc')->get();
        // return view(route('orders.edit'), compact('order','types'));
        // return view('orders.edit', compact('order','types'));

        return $this->create_edit($order);
    }

    public function create_edit(Order $order)
    {
        $types = Type::orderBy('sort_order', 'asc')->get();
        return view('orders.edit', compact('order','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'customer_name'=>'required',
    //         'number_of_copies'=>'required',
    //         'payment_type'=>'required'
    //     ]);
    //     $order = Order::find($id);
    //     $order->customer_name =  $request->get('customer_name');
    //     $order->number_of_copies = $request->get('number_of_copies');
    //     $order->payment_type = $request->get('payment_type');
    //     $order->save();
    //     return redirect(route('orders.index'))->with('success', 'Order updated!');
    // }

    public function update(Request $request, Order $order)
    {
        // dd($request);
        $request->validate([
            'customer_name'=>'required',
            'number_of_copies'=>'required',
            'payment_type'=>'required'
        ]);
        // $order = Order::find($id);
        // dd($request);
        // $order->customer_name =  $request->get('customer_name');
        // $order->number_of_copies = $request->get('number_of_copies');
        // $order->payment_type = $request->get('payment_type');

        // dd($request->all());
        $temp = $request->all();
        unset($temp['logo']);
        // dd($temp);

        // $order->fill($request->all())->save();
        $order->fill($temp)->save();
        $request->logo->store('logos');
        // $order->save();
        return redirect(route('orders.index'))->with('success', 'Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect(route('orders.index'))->with('success', 'Order deleted!');
    }
}
