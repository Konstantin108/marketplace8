<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @param int $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $name = Auth::check() ? Auth::user()->name : "пользователь не найден";
        $userId = Auth::user()->id;

        $myTasks = Task::select()
            ->where('user_id', $userId)
            ->paginate(10);
        $msg = '';

        return view('content/tasks/account', [
            'userId' => $userId,
            'name' => $name,
            'myTasks' => $myTasks,
            'msg' => $msg
        ]);
    }
}
