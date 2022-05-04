<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index()
    {
        $orderproduct = OrderProduct::select(DB::raw("COUNT(*) as count"))
            ->WhereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = OrderProduct::select(DB::raw("Month(created_at) as month"))
            ->WhereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index => $month) {
            --$month;
            $data[$month] = $orderproduct[$index];
        }

        return view('admin.statistical.index', [
            'data' => $data
        ]);
    }
}
