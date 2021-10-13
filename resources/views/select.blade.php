@include('nav')
@if($task)
   ID: {{ $task->id }} <br>
   Uloha: {{ $task->content }} <br>
   Pridelena: {{ $task->owner }} <br>
@else
    Uloha neexistuje
@endif
