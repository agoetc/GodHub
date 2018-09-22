<?php

namespace App\Http\Controllers;


use App\Model\God;

class GodController extends Controller
{

    public function get(int $id) {
         $god = God::find($id);
        return view('god.detail', ['god' => $god]);
    }

}