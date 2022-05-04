<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class productController extends Controller
{
    public function show($id)
        {
            $product_detail = Product::findOrFail($id);

            return view('mypage.product-details', ['product' => $product_detail]);
        }
}
