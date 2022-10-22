<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodRequest;
use App\Models\Good;
use App\Models\PublishedGood;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $goods = Good::select()->get();
        return view('content/goods/goods', ['goods' => $goods]);
    }

    public function showPublishedGoods(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $publishedGoods = PublishedGood::select()->get();
        return view('content/publishedGoods/publishedGoods', ['publishedGoods' => $publishedGoods]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteGood(int $id): \Illuminate\Http\RedirectResponse
    {
        $good = Good::findOrFail($id);
        $good->delete();
        $goods = Good::select()->get();
        if ($good) {
            return redirect()->route('goods', ['goods' => $goods])
                ->with('success', 'Товар удалён!');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showGood(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $good = Good::findOrFail($id);
        return view('content/goods/show', ['good' => $good]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createGood(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('content/goods/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GoodRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeGood(GoodRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $data['price'] = $request->get('price');
        $data['info'] = $request->get('info');
        $data['counter'] = $request->get('counter');
        $data['brand'] = $request->get('brand');
        $data['designer'] = $request->get('designer');
        $data['img'] = $request->get('img');
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('goods', $fileName . '.' . $originalExt, 'public');
            $data['img'] = $fileLink;
        }
        $good = Good::create($data);
        if ($good) {
            return redirect()->route('goods')
                ->with('success', 'Данные о товаре добавлены.');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }

    public function publishedGoods()
    {
        PublishedGood::get()->each->delete();
        $publishedGoods = DB::table('goods')->select(
            'table_id',
            'name',
            'price',
            'info',
            'counter',
            'category',
            'brand',
            'sex',
            'designer',
            'size',
            'sale',
            'img'
        )->get();

        foreach ($publishedGoods as $item) {
            if (is_object($item)) {
                $publishedGood = new PublishedGood();
                $publishedGood->table_id = $item->table_id;
                $publishedGood->name = $item->name;
                $publishedGood->price = $item->price;
                $publishedGood->info = $item->info;
                $publishedGood->counter = $item->counter;
                $publishedGood->category = $item->category;
                $publishedGood->brand = $item->brand;
                $publishedGood->designer = $item->designer;
                $publishedGood->size = $item->size;
                $publishedGood->sex = $item->sex;
                $publishedGood->sale = $item->sale;
                $publishedGood->img = $item->img;
                $publishedGood->save();
            }
        }
        $publishedGoods = PublishedGood::select()->get();
        return redirect()->route('showPublishedGoods', ['publishedGoods' => $publishedGoods]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $good = Good::findOrFail($id);
        return view('content/goods/edit', ['good' => $good]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GoodRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GoodRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $good = Good::findOrFail($id);
        $data = $request->validated();
        $data['price'] = $request->get('price');
        $data['info'] = $request->get('info');
        $data['counter'] = $request->get('counter');
        $data['brand'] = $request->get('brand');
        $data['designer'] = $request->get('designer');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('goods', $fileName . '.' . $originalExt, 'public');
            $data['img'] = $fileLink;
        }
        if (!$request->hasFile('img') && $request->post('no_photo')) {
//            Storage::disk('public')->delete($good->img);     //<-- не удаляю фото из папки для товаров, так как эти же фото могут
            $data['img'] = '';                                  //быть использованы при парсинге
        }
        $good = $good->fill($data)->save();
        if ($good) {
            return redirect()->route('showGood', ['id' => $id])
                ->with('success', 'Данные о товаре обновлены.');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }
}
