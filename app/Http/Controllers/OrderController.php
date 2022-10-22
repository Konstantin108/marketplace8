<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Order;
use App\Models\PublishedGood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allMyOrders()
    {
        $userId = Auth::user()->id;
        $orders = Order::select()->where('user_id', $userId)->get();
        foreach ($orders as $order) {
            if ($order['goods'] == 'null') {
                $order->delete();
            }
        }
        return view('content/orders/myOrders', ['orders' => $orders]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allOrders()
    {
        $orders = Order::select()->get();
        foreach ($orders as $order) {
            if ($order['goods'] == 'null') {
                $order->delete();
            }
        }
        return view('content/orders/allOrders', ['orders' => $orders]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getThisOrder(int $id)
    {
        $actualGoodsId = PublishedGood::select()->get();
        $order = Order::findOrFail($id);
        $goodsInOrderJSON = json_decode($order['goods']);
        $goodsInOrder = [];
        $actualKeys = [];
        $actualGoodsIdArr = [];
        $actualCount = [];
        $actualTotalPrice = [];
        foreach ($actualGoodsId as $actualGoodId) {
            $actualGoodsIdArr[] = $actualGoodId->table_id;
        }
        foreach ($goodsInOrderJSON as $key => $item) {
            if (in_array($key, $actualGoodsIdArr)) {
                $actualKeys[$key] = $item;
                $price = DB::table('publishedGoods')
                    ->where('table_id', $key)
                    ->value('price');
                $actualCount[] = count($item);
                $actualTotalPrice[] = $price * count($item);
            }else {
                $good = new Good();
                $good->img = '';
                $good->id = '0';
                $good->name = 'Товар отсутствует';
                $good->price = '0';
                $good->counter = '0';
                $goodsInOrder[] = $good;
            }
        }
        $actualCount = array_sum($actualCount);
        $actualTotalPrice = array_sum($actualTotalPrice);
//        $data['goods'] = $actualKeys;
        $data['count'] = $actualCount;
        $data['sum'] = $actualTotalPrice;
        $order->fill($data)->save();
        $order->goods = $actualKeys;
        $order->count = $actualCount;
        $order->sum = $actualTotalPrice;
        foreach ($actualKeys as $key => $item) {
            $idOFGood = DB::table('publishedGoods')
                ->where('table_id', $key)
                ->value('id');
            $good = PublishedGood::findOrFail($idOFGood);
            $good->counter = count($item);
            $goodsInOrder[] = $good;
        }
        return view('content/orders/oneOrder', [
            'order' => $order,
            'goodsInOrder' => $goodsInOrder
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getOrder(int $id)
    {
        $actualGoodsId = PublishedGood::select()->get();
        $order = Order::findOrFail($id);
        $goodsInOrderJSON = json_decode($order['goods']);
        $goodsInOrder = [];
        $actualKeys = [];
        $actualGoodsIdArr = [];
        $actualCount = [];
        $actualTotalPrice = [];
        foreach ($actualGoodsId as $actualGoodId) {
            $actualGoodsIdArr[] = $actualGoodId->table_id;
        }
        foreach ($goodsInOrderJSON as $key => $item) {
            if (in_array($key, $actualGoodsIdArr)) {
                $actualKeys[$key] = $item;
                $price = DB::table('publishedGoods')
                    ->where('table_id', $key)
                    ->value('price');
                $actualCount[] = count($item);
                $actualTotalPrice[] = $price * count($item);
            } else {
                $good = new Good();
                $good->img = '';
                $good->id = '0';
                $good->name = 'Товар отсутствует';
                $good->price = '0';
                $good->counter = '0';
                $goodsInOrder[] = $good;
            }
        }
        $actualCount = array_sum($actualCount);
        $actualTotalPrice = array_sum($actualTotalPrice);
//        $data['goods'] = $actualKeys;         //<--при обновлении модели корзины так же обновит состояние в БД
        $data['count'] = $actualCount;        //то есть вместо пометки в заказе, что товар сейчас отсутствует,
        $data['sum'] = $actualTotalPrice;     //он будет удален из заказа. Оставил обновление в БД суммы заказа и количества товаров,
        $order->fill($data)->save();           //но столбец goods не обновляю
        $order->goods = $actualKeys;
        $order->count = $actualCount;
        $order->sum = $actualTotalPrice;
        foreach ($actualKeys as $key => $item) {
            $idOFGood = DB::table('publishedGoods')
                ->where('table_id', $key)
                ->value('id');
            $good = PublishedGood::findOrFail($idOFGood);
            $good->counter = count($item);
            $goodsInOrder[] = $good;
        }
        return view('content/orders/order', [
            'order' => $order,
            'goodsInOrder' => $goodsInOrder
        ]);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrderStatus(Request $request, int $id)
    {
        $data['status'] = $request->post('status');
        $order = Order::findOrFail($id);
        $order = $order->fill($data)->save();
        if ($order) {
            return redirect()->route('getThisOrder', ['id' => $id])
                ->with('success', 'Статус заказа обновлён.');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrderStatusByAdmin(Request $request, int $id)
    {
        $data['status'] = $request->post('status');
        $order = Order::findOrFail($id);
        $order = $order->fill($data)->save();
        if ($order) {
            return redirect()->route('getOrder', ['id' => $id])
                ->with('success', 'Статус заказа обновлён.');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrder(int $id)
    {
        $order = Order::findOrFail($id);
        $orders = Order::select()->get();
        $order->delete();
        if ($order) {
            return redirect()->route('allOrders', ['orders' => $orders])
                ->with('success', 'Заказ удалён!');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }
}
