<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Admin;



class TasksController extends Controller
{

    public function listTasks(Admin $admin){
        $admin = Admin::where('id', '=', session('LoggedUser'))->first();
        $tasks = Task::where('finished', 0)->where('admin_id', $admin->id)->orderBy('created_at', 'desc')->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'admin' => $admin,
        ]);
    }

    public function createTask(){
        return view('tasks.create');
    }

    public function storeTask(Request $request){
        $data = [
            'LoggedUserInfo' => Admin::where('id', '=', session('LoggedUser'))->first(),
        ];

        $request->validate([
            'name' => 'required|max:55',
        ]);

        // Insert into database
        $task = new Task;
        $task->name = $request->name;
        $task->admin_id = $data['LoggedUserInfo']->id;
        //$task->finished = 0;
        $task->save();

        return redirect('/tasks');
    }

    public function finishTask($id){
        $task_id = Task::find($id)->id;
        
        Task::where('id', $task_id)->update(['finished' => 1]);

        return redirect('/tasks');
    }

    public function deleteTask($id){
        $task_id = Task::find($id)->id;

        Task::where('id', $task_id)->delete();

        return redirect('/tasks');
    }
}
