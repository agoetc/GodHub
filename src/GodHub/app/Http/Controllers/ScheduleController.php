<?php


namespace App\Http\Controllers;


use App\Model\God;
use App\Model\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function create(Request $req, int $godId)
    {
        $god = God::find($godId);
        return view('god.schedule.index', ['god' => $god]);
    }

    public function add(int $godId)
    {
        $god = God::find($godId);
        return view('god.schedule.add', ['god' => $god]);
    }

    /** 先読み実装 */
    public function post(Request $req, int $godId)
    {
        $schedule = new Schedule();
        $schedule->god_id = $godId;
        $schedule->week = $req->week;
        $schedule->time = $req->time;
        $schedule->do = $req->do;
        $schedule->save();

        $god = God::find($godId);
        return redirect(action('ScheduleController@create', ['god' => $god]));
    }

}