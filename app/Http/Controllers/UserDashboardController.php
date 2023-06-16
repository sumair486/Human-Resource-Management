<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\Task;
use App\Models\TimeTracker;
use App\Models\TimeBreaker;
use DateTime;
use DateTimeZone;
use Timezone;
use DB;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        
         $MissingTimeBraker = TimeBreaker::where('breakout',null)->groupby('employee_id')->whereDate('created_at', Carbon::today())->get();
    
        $employee = Auth::user()->employee;
        
         $employeeLogin = TimeTracker::select('employee_id')
        ->where('is_checkin',1)
        ->groupby('employee_id')
        ->get();

        $leaveCount = DB::table('leaves')
        ->where('employee_id', $employee->id)
        ->where('status', 'approved')
        ->whereYear('created_at', date('Y'))
        ->sum('days');

        $ongoingTaskCount = DB::table('tasks')
        ->where('employee_id', $employee->id)
        ->whereIn('status', ['ongoing'])
        ->count();

        $pendingTaskCount = DB::table('tasks')
        ->where('employee_id', $employee->id)
        ->whereIn('status', ['pending'])
        ->count();

        $inprogressTaskCount = DB::table('tasks')
        ->where('employee_id', $employee->id)
        ->whereIn('status', ['in progress'])
        ->count();

        $completedTaskCount = DB::table('tasks')
        ->where('employee_id', $employee->id)
        ->whereIn('status', ['completed'])
        ->count();

        $ongoingPendingTasks = Task::where(['employee_id' => $employee->id])->whereNotIn('status', ['completed'])->orderBy('created_at', 'desc')->get();

        $employeeTimes = TimeTracker::orderBy('id', 'desc')
        ->where('employee_id', $employee->id)
        ->get();
        
        
          $missingCheckouts= TimeTracker::whereNull('checkout')->whereMonth('date',Carbon::now()->month)->get();
    

        // dd($employeeTimes);

        // dd($EmployeeTime);

        // // total hours between two dates
        // $start_date = new DateTime($timeEntry->checkin);
        // $since_start = $start_date->diff(new DateTime($timeEntry->checkout));
        // dd($since_start->h);

        // $timezoneDate = date('g:i a', strtotime(now()));
        // dd($timezoneDate);

        // -------------24 hours to 12 hours conversion using string
        // $date = '2021-02-26 11:00:13';
        // dd(date('g:i a', strtotime($userCreated_at->created_at)));

        // $checkinDone = TimeTracker::whereNull('checkout')
        //     ->whereHas('employee', function ($query) {
        //         $query->where('id', Auth::user()->employee->id);
        //     })
        //     ->first();

        // $checkinPrevious = TimeTracker::whereNull('checkout')
        // ->where('employee_id', $employee->id)
        // ->whereDate('date', Carbon::yesterday())
        // ->first();
        // dd($checkinPrevious);

        $checkinDone = TimeTracker::whereNull('checkout')
        ->where('employee_id', $employee->id)
        ->where('date', Carbon::today())
        ->first();

        $breakinDone = TimeBreaker::whereNull('breakout')
        ->where('employee_id', $employee->id)
        ->where('date', Carbon::today())
        ->first();

        $totalAttendanceCurrentMonth = TimeTracker::where('employee_id', Auth::user()->employee->id)
        ->whereMonth('date', Carbon::now()->month)
        ->count();

        $timeTrackercheckoutIsNull = TimeTracker::whereNull('checkout')
        ->where('employee_id', Auth::user()->employee->id)
        ->whereDate('date', Carbon::today())
        ->first();

        $todayBreakTime = TimeBreaker::where('employee_id', Auth::user()->employee->id)
        ->whereDate('date', Carbon::today())
        ->get();

            if($timeTrackercheckoutIsNull){
                $sum_total_hours = TimeBreaker::where([
                    'employee_id' => Auth::user()->employee->id,
                    'date' => Carbon::today()
                    ])
                    ->sum(DB::raw("TIME_TO_SEC(total_hours)"));
                    $sumBreakTime = gmdate("H:i:s", $sum_total_hours);
            }
            else{
                $sumBreakTime ="00:00:00";
            }

        return view('user_account.dashboard', compact(
            'employee',
            'employeeLogin',
            'leaveCount',
            'ongoingTaskCount',
            'pendingTaskCount',
            'inprogressTaskCount',
            'completedTaskCount',
            'ongoingPendingTasks',
            'checkinDone',
            'breakinDone',
            'employeeTimes',
            'totalAttendanceCurrentMonth',
            'todayBreakTime',
            'sumBreakTime',
            'missingCheckouts',
            'MissingTimeBraker'
        ));
        
        // return $MissingTimeBraker;
    }


    public function checkInTimeStore(Request $request)
    {
        $employee = Auth::user()->employee;

        $timeTracker = new TimeTracker;

        $timeTracker->employee_id = $employee->id;
        $timeTracker->checkin = new DateTime("now", new DateTimeZone('Asia/Karachi'));
        $timeTracker->date = Carbon::today();
        $timeTracker->is_checkin =1;
        $timeTracker->save();

        return redirect('/emp/dashboard')->with('success', 'CheckIn time has been submited');

    }

    public function breakInTimeStore(Request $request)
    {
        $employee = Auth::user()->employee;

        // DB::table('time_tracker')->whereExists('date');

        $checkInId = TimeTracker::select('id')->whereNull('checkout')
            ->where('employee_id', Auth::user()->employee->id)
            ->whereDate('date', Carbon::today())
            ->first();

        $timeBreaker = DB::table('time_breaks')->insert([
            'time_tracker_id' => $checkInId->id,
            'employee_id' => $employee->id,
            'date' => Carbon::today(),
            'breakin' => new DateTime("now", new DateTimeZone('Asia/Karachi')),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Break time has been submited');
    }

    public function breakOutTimeUpdate(Request $request)
    {
        $checkInId = TimeTracker::select('id')->whereNull('checkout')
            ->where('employee_id', Auth::user()->employee->id)
            ->whereDate('date', Carbon::today())
            ->first();

        $timeEntry = TimeBreaker::whereNull('breakout')
            ->where('time_tracker_id', $checkInId->id)
            ->first();

            if ($timeEntry)
            {
                $timeEntry->update([
                    'breakout' =>  new DateTime("now", new DateTimeZone('Asia/Karachi')),
                ]);

                $totalTime = TimeBreaker::select('breakin', 'breakout')->whereNull('total_hours')
                ->where('time_tracker_id', $checkInId->id)
                ->first();

                // -------------total time between two Date time with Carbon object
                $start_time = new Carbon($totalTime->breakin);
                $end_time = new Carbon($totalTime->breakout);
                $start_time->format('g:i a');
                $end_time->format('g:i a');
                $total_time = $start_time->diffInHours($end_time). ':' .$start_time->diff($end_time)->format('%I:%S');

                $timeEntry->update([
                    'total_hours' =>  $total_time,
                ]);

                return redirect('/emp/dashboard')->with('success', 'Break Off time has been submited');
            }
    }

    public function checkOutTimeUpdate(Request $request)
    {
        $timeEntry = TimeTracker::whereNull('checkout')
        ->where('employee_id', Auth::user()->employee->id)
        ->whereDate('date', Carbon::today())
        ->firstOrFail();

        if ($timeEntry)
        {
            $timeEntry->update([
                'checkout' =>  new DateTime("now", new DateTimeZone('Asia/Karachi')),
                'is_checkin' => $request->is_checkin
            ]);

            $totalTime = TimeTracker::select('checkin', 'checkout')->whereNull('total_hours')
            ->where('employee_id', Auth::user()->employee->id)
            ->whereDate('date', Carbon::today())
            ->first();

            // -------------total time between two Date time with Carbon object
            $start_time = new Carbon($totalTime->checkin);
            $end_time = new Carbon($totalTime->checkout);
            $start_time->format('g:i a');
            $end_time->format('g:i a');
            $total_time = $start_time->diffInHours($end_time). ':' .$start_time->diff($end_time)->format('%I:%S');


            $timeTrackerId = TimeTracker::select('id')->whereNull('break_hours')
            ->where('employee_id', Auth::user()->employee->id)
            ->whereDate('date', Carbon::today())
            ->first();

            $sum_total_hours = TimeBreaker::where([
             'time_tracker_id' => $timeTrackerId->id,
             'employee_id' => Auth::user()->employee->id,
             'date' => date('Y-m-d')
             ])
            ->sum(DB::raw("TIME_TO_SEC(total_hours)"));
            $sumTime = gmdate("H:i:s", $sum_total_hours);

            $timeEntry->update([
                'total_hours' =>  $total_time,
                'break_hours' =>  $sumTime,
            ]);

            // --- w------
            $getWorkingHours = TimeTracker::select('total_hours', 'break_hours')
            ->where('employee_id', Auth::user()->employee->id)
            ->where('date', Carbon::today())->orderBy('created_at', 'DESC') 
            ->first();
            // --- w------

            // dd($getWorkingHours->created_at);

            $totalHours = new Carbon($getWorkingHours->total_hours);
            $totalBreaks = new Carbon($getWorkingHours->break_hours);
            $totalHours->format('h:i:s');
            $totalBreaks->format('h:i:s');

            $workingHours = $totalHours->diffInHours($totalBreaks). ':' .$totalHours->diff($totalBreaks)->format('%I:%S');

            // dd($workingHours);
            $timeEntry->update([
                'working_hours' =>  $workingHours,
            ]);

            // ---

            return redirect('/emp/dashboard')->with('success', 'CheckOut time has been submited');
        }
        else{
            return redirect('/emp/dashboard')->with('success', 'CheckOut time is missing');
        }

    }

    public function viewTime($id)
    {
        // $viewTimeTracker = TimeTracker::where('employee_id', Auth::user()->employee->id)
        // ->where('time_tracker_id', $id)->timebreaks;
        $viewTimeTracker = TimeTracker::find($id)->timebreaks;
        // ->get();
        // dd($viewTimeTracker);

        return response()->json($viewTimeTracker);
        // return view('user_account.dashboard', compact('viewTimeTracker'));
    }

    public function updateTime(Request $request, $id)
    {
        $viewTime = DB::table('time_tracker')
        ->where('id', $id)
        ->update([
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
        ]);

        return response()->json($viewTime);
    }
    
    public function MonthlyReport($id)
    {
        // $employeee = Auth::user()->employee;
         $employee= Employee::where('id',$id)->get();
        //  $id = Auth::user()->employee_id;
    
      $reports= TimeTracker::where('employee_id',$id)
    //   ->whereMonth('date', Carbon::now()->month)
    ->orderBy('id', 'ASC')
      ->get();
      

    //   return $employee;
      return view('user_account.monthly_report', compact('reports','employee'));
    
    }


}
