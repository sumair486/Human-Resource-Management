<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Task;
use App\Models\TimeTracker;
use App\Models\TimeBreaker;
use DateTime;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $MissingTimeBraker = TimeBreaker::where('breakout',null)->whereDate('created_at', Carbon::today())->get();
        
            $employeeLogin = TimeTracker::select('employee_id')
        ->where('is_checkin',1)
        ->groupby('employee_id')
        ->get();
        $totalEmployees = DB::table('employees')->count();

        $totalClients = DB::table('clients')->count();

        $totalProjects = DB::table('projects')->count();
        $processProjects = DB::table('projects')->where('status', 'process')->count();
        $pendingProjects = DB::table('projects')->where('status', 'pending')->count();
        $completedProjects = DB::table('projects')->where('status', 'completed')->count();

        $totalTasks = DB::table('tasks')->count();
        $totalTasksOngoing = DB::table('tasks')->where('status', 'ongoing')->count();
        $totalTasksCompleted = DB::table('tasks')->where('status', 'completed')->count();

        $projectStatus = DB::table('tasks')
        ->join('projects', 'projects.id', '=', 'tasks.project_id')
        ->select('projects.id','projects.title', DB::raw('COUNT(tasks.status) as count_status'))
        ->where('tasks.status', 'completed')
        ->groupBy('projects.id','projects.title')
        ->get();

        $todayLeaves = DB::table('leaves')->whereDate('created_at', date('Y-m-d'))->count();

        $totalUser = DB::table('users')->select('employee_id')->where('employee_id', Auth::user()->employee_id)->get();

        $totalUserActive = DB::table('users')->where('status', 1)->count();
        $totalUserInactive = DB::table('users')->where('status', 0)->count();

        $ongoingTasks = Task::where(['status' => 'ongoing'])->get();
        
        

        $loggedInUser = Auth::user()->email;

        $todayCheckins = DB::table('time_tracker')
        ->join('employees', 'employees.id', '=', 'time_tracker.employee_id')
        ->where('time_tracker.date', Carbon::today())->get();

        // $pendingProjectsDatas = DB::table('tasks')
        // ->join('projects', 'projects.id', '=', 'tasks.project_id')
        // ->join('clients', 'clients.id', '=', 'projects.client_id')
        // ->select(
        //     'projects.title',
        //     'clients.full_name',
        //     DB::raw('COUNT(tasks.project_id) as taskCount'),
        //     DB::raw('COUNT(select tasks.status from tasks where tasks.status = "in progress") as taskPending'),
        // )
        // ->groupBy(
        //     'projects.title',
        //     'clients.full_name',
        // )
        // ->get();
        // dd($pendingProjectsDatas);

        // $missingCheckouts = DB::table('time_tracker')
        // ->join('employees', 'employees.id', '=', 'time_tracker.employee_id')
        // ->whereNull('time_tracker.checkout')
        // ->get();
        
        $missingCheckouts= TimeTracker::whereNull('checkout')->whereMonth('date',Carbon::now()->month)->get();
        // dd($missingCheckouts);
        
  

        return view('dashboard.index', compact(
         'totalEmployees',
         'employeeLogin',
         'totalClients',
         'totalProjects',
         'processProjects',
         'pendingProjects',
         'completedProjects',
         'totalTasks',
         'totalTasksOngoing',
         'totalTasksCompleted',
         'ongoingTasks',
         'todayCheckins',
         // 'pendingProjectsDatas',
         'missingCheckouts'
         // 'MissingTimeBraker'
         ));
        
        
        // return $MissingTimeBraker;
        
        
    }
}
