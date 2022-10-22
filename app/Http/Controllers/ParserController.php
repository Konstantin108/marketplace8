<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Services\ParserService;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
        $service->setLink(asset('/assets/data.xml'))->parsing();
        $goods = Good::select()->get();
        return view('content/goods/goods', ['goods' => $goods]);
    }
}
