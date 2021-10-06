<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->toDateTimeString();
        $taskData = [
            'id' => 1,
            'content' => "Pes",
            'owner' => "Maria",
            'created_at' => $date,
            'updated_at' => $date
        ];
        $task = Task::find($taskData['id']);
        if(!$task) {
            Task::insert($taskData);
        }
    }
}
