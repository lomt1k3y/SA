<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;



class ImageController extends Controller
{

    public function saveAvatar(Request $request)
    {
        $user = Auth::user();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('avatars', $imageName, 'public');
        $user->avatar = $imageName;
        $user->save();
        return redirect()->back();
    }

    public function showImages()
    {
        $images = User::whereNotNull('avatar')->orderBy('updated_at', 'desc')->get();
        return view('welcome', ['images' => $images]);
    }
    public function capture()
    {
        // Сохраняем сообщение о создании аватара в сессию
        Session::flash('message', 'Аватар создан');
        return redirect()->back();
    }


    public function likeAvatar(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->likes++;
        $user->save();

        return response()->json(['success' => true, 'likes' => $user->likes]);
    }

    public function redirectToHomeOrRegister()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect('/register');
        }
    }
    public function sortLike()
    {
        $images = User::orderBy('likes', 'desc')->get();
        return view('gallery', compact('images'));
    }

    public function userMessage()
    {
        return view('message');
    }

}

