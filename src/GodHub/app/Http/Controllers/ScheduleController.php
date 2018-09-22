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

        $mon = Schedule
            ::where('god_id', $godId)
            ->where('week', "月")
            ->get();

        $tues = Schedule
            ::where('god_id', $godId)
            ->where('week', "火")
            ->get();

        $wednes = Schedule
            ::where('god_id', $godId)
            ->where('week', "水")
            ->get();

        $thurs = Schedule
            ::where('god_id', $godId)
            ->where('week', "木")
            ->get();

        $fri = Schedule
            ::where('god_id', $godId)
            ->where('week', "金")
            ->get();

        $satur = Schedule
            ::where('god_id', $godId)
            ->where('week', "土")
            ->get();

        $sun = Schedule
            ::where('god_id', $godId)
            ->where('week', "日")
            ->get();

        return view('god.schedule.index', [
            'god' => $god,
            'mon' => $mon,
            'tues' => $tues,
            'wednes' => $wednes,
            'thurs' => $thurs,
            'fry' => $fri,
            'satur' => $satur,
            'sun' => $sun
        ]);
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