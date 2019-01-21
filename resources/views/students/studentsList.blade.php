@extends('layout')

@section('content')
<div style="margin: 3em 0 0 3em">
    <label style="text-underline: black"><h1>Lista uczniów </h1></label>
</div>
<div style="padding: 5em">
<table class="table table-hover">
    <thead>
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>PESEL</th>
            <th>Klasa</th>
            <th>Oddział</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <th>{{$student->name}}</th>
            <th>{{$student->surname}}</th>
            <th>{{$student->pesel}}</th>
            <th>{{$student->class}}</th>
            <th>{{$student->sectionName}}</th>
            <td>
                <a class="button" href="{{ route('student.edit', $student) }}">Edytuj</a>
                <a class="button" href="{{route('student.destroy', $student)}}" onclick="return confirm('Are you sure?')">Usuń</a>
                <a class="button" href="{{route('messages.create', $student)}}">Wiadomość</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

    {{$students->links()}}
@endsection