<?php

namespace App\Http\Controllers;


use App\Model\God;
use Illuminate\Http\Request;

class GodController extends Controller
{

    public function detail(int $id)
    {
        $god = God::find($id);
        return view('god.detail', ['god' => $god]);
    }

    public function create(Request $req)
    {
        $god = new God();
        $god->name = $req->name;
        $god->detail = $req->detail;
        $god->save();
        return redirect(action('GodController@detail', $god->id));
    }

}