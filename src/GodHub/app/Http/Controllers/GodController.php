<?php

namespace App\Http\Controllers;


use App\Model\God;
use App\Model\Worship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GodController extends Controller
{

    public function detail(int $id)
    {
        $god = God::find($id);
        $worshipSum = Worship::where('god_id', $id)->where('status',true)->count();
        $check = Worship::where('user_id', Auth::id())->first();
        return view('god.detail', [
            'god' => $god,
            'worshipSum' => $worshipSum,
            'check' => $check
        ]);
    }

    public function create(Request $req)
    {
        $god = new God();
        $god->name = $req->name;
        $god->detail = $req->detail;
        $god->save();
        return redirect(action('GodController@detail', $god->id));
    }

    public function worshipUpdate(int $godId){
        $check = Worship::where('user_id',Auth::id())->first();
        if($check->status){
            $check->status = false;
            $check->save();
        }else{
            $check->status = true;
            $check->save();
        }
        return redirect(action('GodController@detail', $godId));

    }

    public function worship(Request $req, int $godId) {
        $check = Worship::where('user_id', Auth::id())->first();
        if($check) {
            return redirect(action('GodController@worshipUpdate',$godId));
        }
            $worship = new Worship();
            $worship->user_id = Auth::id();
            $worship->god_id = $godId;
            $worship->status = true;
            $worship->save();

        return redirect(action('GodController@detail', $godId));
    }

    public function edit(Request $req, int $godId){
        $god = God::Find($godId);
        return view( 'god.edit', ['god'=> $god]);

    }

    public function update(Request $req, int $godId){
        $god = God::Find($godId);
        $god->name = $req->name;
        $god->detail = $req->detail;
        $god->save();
        return redirect(action('GodController@detail', $godId));
    }

}