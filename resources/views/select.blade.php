@include('nav')
@if($task)
   ID: {{ $task->id }} <br>
   Uloha: {{ $task->content }} <br>
   Pridelena: {{ $task->owner->owner_name }} <br>
@else
    Uloha neexistuje
@endif
