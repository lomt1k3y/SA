<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\User;

class GalleryController extends Controller
{
    public function allShow()
    {
        $users = User::whereNotNull('avatar')->orderBy('updated_at', 'desc')->get();
        return view('gallery', [ 'users' => $users]);
    }
}
