<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function myProfile()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('content/profile/myProfile', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editProfile()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('content/profile/editProfile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(ProfileRequest $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $data = $request->validated();
//        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $originalExt = $image->getClientOriginalExtension();
            $fileName = uniqid();
            $fileLink = $image->storeAs('users', $fileName . '.' . $originalExt, 'public');
            $data['avatar'] = $fileLink;
        }
        if (!$request->hasFile('avatar') && $request->post('no_photo')) {
            Storage::disk('public')->delete($user->avatar);
            $data['avatar'] = '';
        }
        $oldPassIsTrue = false;
        if ($request->post('old_password')) {
            if (Hash::check($request->post('old_password'), $user->password)) {
                $oldPassIsTrue = true;
            } else {
                return back()
                    ->with('errorOldPass', 'Старый пароль введён неверно.');
            }
        }
        if ($request->post('new_password') && !$oldPassIsTrue ||
            $request->post('new_password_confirmation') && !$oldPassIsTrue) {
            return back()
                ->with('errorNewPass', 'Старый пароль введён неверно.');
        } elseif (!$request->post('new_password') && $request->post('new_password_confirmation')) {
            return back()
                ->with('errorNewPass', 'Пароли не совпадают.');
        } elseif ($request->post('new_password') && $request->post('new_password_confirmation') && $oldPassIsTrue) {
            $data['password'] = Hash::make($request->post('new_password'));
        }
        $user->fill($data)->save();
        if ($user) {
            return redirect()->route('myProfile', ['id' => $id])
                ->with('success', 'Данные пользователя обновлены.');
        }
        return back()
            ->with('error', 'Произошла ошибка!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
