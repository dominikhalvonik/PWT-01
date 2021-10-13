@include('nav')
@if(count($tasks) > 0)
    <table>
        <tr>
            <td>ID</td>
            <td>Uloha</td>
            <td>Pridelena</td>
            <td>Datum vytvorenia</td>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->content }}</td>
                <td>{{ $task->owner }}</td>
                <td>{{ date("d.m.Y", strtotime($task->created_at)) }}</td>
                <td><a href="{{ route('delete', ['id' => $task->id]) }}">Vymaz</a></td>
                <td><a href="{{ route('select', ['id' => $task->id]) }}">Detail</a></td>
                <td><a href="{{ route('update-form', ['id' => $task->id]) }}">Aktualizovat</a></td>

            </tr>
        @endforeach
    </table>
@else
    Neexistuju ulohy
@endif

