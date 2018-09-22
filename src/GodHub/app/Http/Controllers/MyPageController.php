<?php

namespace App\Http\Controllers;


use App\Model\God;
use App\Model\Worship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function myGod(){
        $userId = Auth::id();
        $gods = God::where('user_id',$userId)->get();

        return view('myPage.myGod',['gods'=>$gods]);
    }

    public function worship(){
        $userId = Auth::id();
        $worships = Worship::where('user_id', $userId)->get();
        return view('myPage.worship',['worships' => $worships]);
    }

}

