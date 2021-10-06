<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Task;

class HomeController extends Controller
{
    public function test()
    {
        echo 222;
    }

    public function insertTask()
    {
        $newTask = new Task();
        $newTask->content = "Vyniest smeti";
        $newTask->owner = "Martin";

        $newTask->save();

        echo $newTask->id;
    }

    public function selectTask($id)
    {
        $task = Task::find($id);
        if($task) {
            echo $task->id . "<br>";
            echo $task->content . "<br>";
            echo $task->owner . "<br>";
            echo $task->created_at . "<br>";
        } else {
            echo "Taky task neni";
        }
    }

    public function selectAllTasks()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            echo $task->id . "<br>";
            echo $task->content . "<br>";
            echo $task->owner . "<br>";
            echo $task->created_at . "<br>";
            echo "------------------------------------<br>";
        }
    }

    public function updateTaskOwner($id, $owner)
    {
        $task = Task::find($id);
        if($task) {
            $task->owner = $owner;
            $task->update();
            echo "Zaznam uspesne zmeneny";
        } else {
            echo "Taky task neni";
        }
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if($task) {
            $data = [
                'id' => $task->id,
                'owner' => $task->owner,
                'content' => $task->content
            ];
            $task->delete();
            echo "Uloha: " . "<br>";
            echo $data['id'] . "<br>";
            echo $data['owner'] . "<br>";
            echo $data['content'] . "<br>";
            echo "Vyamazana";
        } else {
            echo "Taky task neni";
        }
    }
}
