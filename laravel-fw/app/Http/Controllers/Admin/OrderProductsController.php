<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderproducts = OrderProduct::paginate(8);

        return view('admin.orderproducts.index', [
            'orderproducts' => $orderproducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $orders = Order::all();

        return view('admin.orderproducts.create', [
            'products' => $products,
            'orders' => $orders
        ]);
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
            'product_id',
            'order_id',
            'price',
            'quantity',
        ]);

        try {
            $orderproduct = OrderProduct::create($data);
            $msg = 'Create order product success.';

            return redirect()
                ->route('admin.orderproducts.index', ['orderproduct' => $orderproduct->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.orderproducts.create')
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
        $orderproduct = OrderProduct::findOrFail($id);
        $products = Product::all();
        $orders = Order::all();

        return view('admin.orderproducts.edit', [
            'orderproduct' => $orderproduct,
            'products' => $products,
            'orders' => $orders
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

        $orderproduct = OrderProduct::findOrfail($id);

        $data = $request->only([
            'product_id',
            'order_id',
            'price',
            'quantity',
        ]);

        try {
            $orderproduct->update($data);
            $msg = 'Update order product success.';

            return redirect()
                ->route('admin.orderproducts.index', ['orderproduct' => $orderproduct->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.orderproducts.edit', ['orderproduct' => $orderproduct->id])
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
        $orderproduct = OrderProduct::findOrFail($id);

        try {
            $orderproduct->delete();
            $msg = 'Delete success.';

            return redirect()
                ->route('admin.orderproducts.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
            $error = 'Please try again!';
        }

        return redirect()
            ->route('admin.orderproducts.index')
            ->with('error', $error);
    }
}
