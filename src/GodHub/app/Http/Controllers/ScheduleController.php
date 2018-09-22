<?php


namespace App\Http\Controllers;


use App\Model\God;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    /** TODO */
    public function create(Request $req, int $godId)
    {
        $god = God::find($godId);
        return view('god.schedule.index', ['god' => $god]);
    }

    /** 先読み実装 */
//    public function post(Request $req, int $godId)
//    {
//        $schedule = new Schedule;
//        $schedule->god_id = $godId;
//        $schedule->week = $req->week;
//        $schedule->time = $req->time;
//        $schedule->do = $req->do;
//        $schedule->save();
//
//        return $schedule;
//    }

}