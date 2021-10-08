<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function test()
    {
        echo 222;
    }

    public function insertTask()
    {
        $task = new Task();
        $task->content = "Uprac izbu";
        $task->owner = "Peto";
        $task->save();

        echo $task->id;
    }

    public function selectTask($id)
    {
        $task = Task::find($id);
        if($task) {
            echo "Uloha s id ".$id."<br>";
            echo $task->content."<br>";
            echo $task->owner."<br>";
        } else {
            echo "Uloha neexistuje";
        }
    }

    public function selectAll()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            echo $task->id . "<br>";
            echo $task->content . "<br>";
            echo $task->owner . "<br>";
            echo $task->created_at . "<br>";
            echo $task->updated_at . "<br>";
            echo "--------------------------<br>";
        }
    }

    public function updateTask($id, $owner)
    {
        $task = Task::find($id);

        if($task) {
            $task->owner = $owner;
            $task->update();
            echo "Uloha aktualizovana";
        } else {
            echo "Uloha neexistuje";
        }
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);

        if($task) {
            $task->delete();
            echo "Uloha zmazana";
        } else {
            echo "Uloha neexistuje";
        }

    }
}
