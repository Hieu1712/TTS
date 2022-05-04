<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(config('product.paginate'));

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();

        return view('admin.products.create', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->only([
            'category_id',
            'name',
            'descripti',
            'price',
            'quantity',
            "product_sold",
            'status',
        ]);

        $file = $request->file('image_url')->getClientOriginalName();

        $data['category_id'] = (int) $data['category_id'];
        
        $data['status'] = isset($data['status']) ? (int) $data['status'] : 0;

        $data['image_url'] = $file;
        
        try {
            $product = Product::create($data);
            $msg = 'Create product success.';

            return redirect()
                ->route('admin.products.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.products.index')
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
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categorys = Category::all();

        return view('admin.products.edit', [
            'categorys' => $categorys,
            'product' => $product,
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
        $product = Product::findOrfail($id);

        $data = $request->only([
            'category_id',
            'image_url',
            'name',
            'descripti',
            'price',
            'quantity',
            'product_sold',
            'status',
        ]);
        
        $data['status'] = isset($data['status']) ? (int) $data['status'] : 0;

        try {
            $product->update($data);
            $msg = 'Update product success.';

            return redirect()
                ->route('admin.products.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.products.index')
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
        $product = Product::findOrFail($id);

        try {
            $product->delete();
            $msg = 'Delete success.';

            return redirect()
                ->route('admin.products.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
            $error = 'Please try again!';
        }

        return redirect()
            ->route('admin.products.index')
            ->with('error', $error);
    }
}
