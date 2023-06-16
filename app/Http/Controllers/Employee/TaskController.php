<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use Response;
use App\Models\Task;
use App\Models\TaskAttachment;
use Carbon\Carbon;
use DB;


class TaskController extends Controller
{
    public function index()
    {
        $employee_id = Auth::user()->employee_id;

        $tasks = Task::where(['employee_id' => $employee_id])->get();

        $modules = DB::table('task_modules')->select('module')->get();

        return view('user_account.task.list', compact('tasks', 'modules'));
    }

    public function edit($id)
    {
        $taskStatus = DB::table('tasks')->select('id', 'status')->where('id', $id)->first();

        $task = Task::find($id);

        $task_attachment = Task::find($id)->task_attachment;

        $modules = DB::table('task_modules')->select('module')->get();

        return view('user_account.task.edit', compact('task', 'taskStatus', 'task_attachment', 'modules'));

        // return response()->json([$task, $modules]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $task = Task::find($id);

        $task->status = $request->status;

        $task->save();

        // return redirect('employee-task')->with('success', 'Record has been updated');
        return response()->json($task);
    }

    public function progressUpdate(Request $request, $id)
    {
        $task = Task::find($id);

        $task->progress = $request->progress;

        $task->save();

        return response()->json($task);
    }

    public function getDownload(Request $request, $id)
    {
        try{
            $task = TaskAttachment::find($id);
            $file = public_path()."/storage/task_files/".$task->attachment;
            $headers = array(
                'Content-Type: application/*',
            );
            return response()->download($file, $task->attachment, $headers);
        }
        catch(\Exception $e){
            return view('errors.file_not_found');
        }
    }

    public function taskProgressStore(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'module' => 'required',
            'hours' => 'required',
            'work_detail' => 'required',
        ]);

        $task = Task::find($id);

        $data = [
            'task_id' => $task->id,
            'date' => $request->date,
            'module' => $request->module,
            'hours' => $request->hours,
            'work_detail' => $request->work_detail,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('task_progress')->insert([$data]);

        return redirect()->back()->with('success', 'Task progress submit successfully');
        // return response()->json('Record has been sent');

    }
    
    public function datecounter(Request $request)
    {
        return 'hi cal rafi';
        
    }

}
