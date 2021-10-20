<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Task;

class HomeController extends Controller
{
    public function test()
    {
        echo 222;
    }

    public function getInsertForm()
    {
        return view('insert');
    }

    public function insertTask(Request $request)
    {
        $content = $request->input('content', "");
        $owner = $request->input('owner', "");

        $existingOwner = Owner::where('owner_name', '=', $owner)->first();
        if(!$existingOwner) {
            $existingOwner = new Owner();
            $existingOwner->owner_name = $owner;
            $existingOwner->email = mt_rand(0,50) . "@gmail.com";
            $existingOwner->save();
        }

        $newTask = new Task();
        $newTask->content = $content;
        $newTask->owner_id = $existingOwner->id;

        $newTask->save();

        return redirect()->route('select-all-tasks');
    }

    public function selectTask($id)
    {
        $task = Task::find($id);
        return view('select', ['task' => $task]);
    }

    public function selectAllTasks()
    {
        $tasks = Task::all();
        return view('select-all', ['tasks' => $tasks]);
    }

    public function getUpdateForm($id)
    {
        $task = Task::find($id);
        return view('update', ['task' => $task]);
    }

    public function updateTaskOwner(Request $request)
    {
        $id = $request->input('id', 1);
        $content = $request->input('content', "");
        $owner = $request->input('owner', "");

        $dbOwner = Owner::where('owner_name', '=', $owner)->first();
        if($dbOwner) {
            $task = Task::find($id);
            $task->content = $content;
            $task->owner_id = $dbOwner->id;
            $task->update();
        }

        return redirect()->route('select', ['id' => $id]);
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('select-all-tasks');
    }
}
