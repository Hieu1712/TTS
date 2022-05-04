<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::where('status','>', 0)
            ->orderByDESC('price')
            ->paginate(config('product.paginate'));
    
        return view('mypage.shop', ['products' => $products]);
    }
}
