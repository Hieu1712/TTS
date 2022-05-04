<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::paginate(6);

        return view('admin.categorys.index', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorys.create');
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
            'image',
        ]);

        $file = $request->file('image')->getClientOriginalName();

        $data['image'] = $file;
        
        try {
            $category = Category::create($data);
            $msg = 'Create category success.';

            return redirect()
                ->route('admin.categorys.show', ['category' => $category->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.categorys.index')
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
        $category = Category::findOrFail($id);

        return view('admin.categorys.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categorys.edit', [
            'category' => $category,
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
        $category = Category::findOrfail($id);

        $data = $request->only([
            'name',
            'image',
        ]);

        try {
            $category->update($data);
            $msg = 'Update category success.';

            return redirect()
                ->route('admin.categorys.show', ['category' => $category->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
        }

        $error = 'Something went wrong.';
        return redirect()
            ->route('admin.categorys.index')
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
        $category = Category::findOrFail($id);

        try {
            $category->delete();
            $msg = 'Delete success.';

            return redirect()
                ->route('admin.categorys.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            Log::error($e);
            $error = 'Please try again!';
        }

        return redirect()
            ->route('admin.categorys.index')
            ->with('error', $error);
    }
}
