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
        $worship = Worship::where('user_id', Auth::id())->where('god_id', $id)->first();

        $status = null;
        if ($worship) {
            $status = $worship->status;
        }

        return view('god.detail', [
            'god' => $god,
            'worshipSum' => $worshipSum,
            'status' => $status
        ]);
    }

    public function create(Request $req)
    {
        $god = new God();
        $god->user_id = Auth::id();
        $god->name = $req->name;
        $god->detail = $req->detail;
        $god->save();

        return redirect(action('GodController@detail', $god->id));
    }

    public function worship(Request $req, int $godId) {
        $worship = Worship::firstOrNew([
            'user_id' => Auth::id(),
            'god_id' => $godId
        ], [
            'status' => false
        ]);

        $worship->status = !$worship->status;
        $worship->user_id = Auth::id();
        $worship->god_id = $godId;
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