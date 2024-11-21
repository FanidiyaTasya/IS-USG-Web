<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getChartData(Request $request)
    {
        $year = $request->query('year', date('Y'));

    
        $data = DB::table('radiologies')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw("SUM(CASE WHEN pregnancy_status = 'Hamil' THEN 1 ELSE 0 END) as pregnant"),
                DB::raw("SUM(CASE WHEN pregnancy_status = 'Tidak Hamil' THEN 1 ELSE 0 END) as not_pregnant")
            )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->get();
            
        return response()->json($data);
    }
}
