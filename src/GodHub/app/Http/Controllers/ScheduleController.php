<?php


namespace App\Http\Controllers;


use App\Model\God;
use App\Model\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ScheduleController extends Controller
{

    public function create(Request $req, int $godId)
    {
        $god = God::find($godId);

        $mon = Schedule
            ::where('god_id', $godId)
            ->where('week', "月")
            ->orderby('time')
            ->get();

        $tues = Schedule
            ::where('god_id', $godId)
            ->where('week', "火")
            ->orderby('time')
            ->get();

        $wednes = Schedule
            ::where('god_id', $godId)
            ->where('week', "水")
            ->orderby('time')
            ->get();

        $thurs = Schedule
            ::where('god_id', $godId)
            ->where('week', "木")
            ->orderby('time')
            ->get();

        $fri = Schedule
            ::where('god_id', $godId)
            ->where('week', "金")
            ->orderby('time')
            ->get();

        $satur = Schedule
            ::where('god_id', $godId)
            ->where('week', "土")
            ->orderby('time')
            ->get();

        $sun = Schedule
            ::where('god_id', $godId)
            ->where('week', "日")
            ->orderby('time')
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
    function outPut(int $godId) {
        date_default_timezone_set('Asia/Tokyo');

        $schedule = Schedule::all();
        $week = ["日","月","火","水","木","金","土"];
        $today_key = date("w");
        $csv_array = array(
            array("Subject", "Start Date", "Start Time"),
        );
        foreach($schedule as $plan){
            $dt = Carbon::now();
            $week_key = array_keys($week,$plan->week);
            $days_ago = intval($today_key) <= $week_key[0] ?  $week_key[0] - intval($today_key): 7 - intval($today_key) ;
            $plans = array($plan->do,$dt->addDay($days_ago)->format('Y/m/d'),$plan->time);
            array_push($csv_array,$plans);
        }

        return  new StreamedResponse(
            function () use ($csv_array) {

                $stream = fopen('php://output', 'w');
                foreach ($csv_array as $c) {
                    fputcsv($stream, $c);
                }
                fclose($stream);
            },
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="todo.csv"',
            ]
        );

    }

}