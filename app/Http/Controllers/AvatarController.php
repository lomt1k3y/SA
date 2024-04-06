<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AvatarController extends Controller
{
    public function saveAvatar(Request $request)
{
    $user = Auth::user();
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        
        $user->avatar = $imageName;
        $user->save();
    }

    return redirect()->back();
}

}
