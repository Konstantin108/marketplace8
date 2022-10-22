<?php

namespace App\Http\Controllers;

use App\Models\PublishedGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublishedGoodController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function siteIndex()
    {
        $publishedGoods = PublishedGood::all();
        return view('content/publishedGoods/siteGoods', ['publishedGoods' => $publishedGoods]);
    }

    public function parserIndex()
    {
        //
    }

    public function delete(int $id)
    {
        //
    }

    /**
     * @param int $id
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function oneGood(int $id, int $link, int $order_id)
    {
        $publishedGood = PublishedGood::findOrFail($id);
        return view('content/publishedGoods/oneGood', [
            'publishedGood' => $publishedGood,
            'link' => $link,
            'order_id' => $order_id
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @param int $tableId
     * @param int $link
     * @param int $orderId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function siteOneGood(Request $request, int $id, int $tableId, int $link, int $orderId)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $thisGoodsInBasket = $request->session()->get(" $userId.$tableId");
            if (is_array($thisGoodsInBasket)) {
                $count = count($request->session()->get(" $userId.$tableId"));
            } else {
                $count = 0;
            }
        } else {
            $count = 0;
        }
        $publishedGood = PublishedGood::findOrFail($id);
        return view('content/publishedGoods/siteOneGood', [
            'publishedGood' => $publishedGood,
            'count' => $count,
            'link' => $link,
            'orderId' => $orderId
        ]);
    }

    /**
     * @param int $link
     * @param int $order_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function backForGood(int $link, int $order_id)
    {
        if ($link == '1') {
            return redirect()->route('publishedGoods');
        } elseif ($link == '2') {
            return redirect()->route('getOrder', ['id' => $order_id]);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getPromo()
    {
        return view('content.publishedGoods.promo');
    }

    public function createGood()
    {
        //
    }


    public function storeGood(Request $request)
    {
        //
    }

    public function edit(int $id)
    {
        //
    }

    public function update(Request $request, int $id)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}
