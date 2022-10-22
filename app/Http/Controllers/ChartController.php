<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ChartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCharts()
    {
        $datesCurrentFormat = [];
        $dates = Order::select()->orderBy('created_at')->get();
        foreach ($dates as $date) {
            $datesCurrentFormat[] = $date->created_at->format('Y-m-d') . ' 00:00:00';
        }
        $datesCurrentFormatUnique = array_unique($datesCurrentFormat);
        $res = [];
        foreach ($datesCurrentFormatUnique as $item) {
            $count = Order::where('created_at', $item)->count();
            $elem['created_at'] = mb_strimwidth($item, 0, 10);
            $elem['value'] = $count;
            $res[] = $elem;
        }
        $resSum = [];
        foreach ($datesCurrentFormat as $item) {
            $sum = Order::where('created_at', $item)->get();
            $arrOfSums = [];
            foreach ($sum as $collectionElem) {
                $currentElem = $collectionElem->sum;
                $arrOfSums[] = $currentElem;
            }
            $arrOfSums = array_sum($arrOfSums);
            $elem['created_at'] = mb_strimwidth($item, 0, 10);
            $elem['value'] = $arrOfSums;
            $resSum[$item] = $elem;
        }
        $result = [];
        foreach ($resSum as $itemArr) {
            $result[] = $itemArr;
        }
        return view('content.charts.charts', [
            'res' => $res,
            'result' => $result
        ]);
    }
}
