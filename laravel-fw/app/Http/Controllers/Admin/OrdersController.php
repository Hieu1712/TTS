<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders  = Order::paginate(8);
        return view ('admin.orders.index', ['orders' => $orders ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'phone',
            'email',
            'address',
            'note',
        ]);

        try {
            $order = Order::create($data);
            $msg = 'Create order success.';

            return redirect()
                ->route('admin.orders.index', ['order' => $order->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.orders.create')
            ->with('error', $error);
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
        $order = Order::findOrFail($id);

        return view('admin.orders.edit', [
            'order' => $order,
        ]);
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

        $order = Order::findOrfail($id);

        $data = $request->only([
            'name',
            'phone',
            'email',
            'address',
            'note',
        ]);

        try {
            $order->update($data);
            $msg = 'Update order success.';

            return redirect()
                ->route('admin.orders.index', ['order' => $order->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.orders.edit', ['order' => $order->id])
            ->with('error', $error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        try {
            $order->delete();
            $msg = 'Delete success.';

            return redirect()
                ->route('admin.orders.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
            $error = 'Please try again!';
        }

        return redirect()
            ->route('admin.orders.index')
            ->with('error', $error);
    }
}
