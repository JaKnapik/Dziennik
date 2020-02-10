@extends('layout')

@section('content')
<div style="margin: 3em 0 0 3em">
    <label style="text-underline: black"><h1>Lista obecności</h1></label>
</div>
<div style="padding: 5em">
<table class="table">
    <thead>
        <tr>
            <th>Obecność</th>
            <th>Opis</th>
            <th>Wystawiający</th>
            <th>Edytujący</th>
            <th>Wpisano dnia:</th>
            <th>Edytowano dnia:</th>
        </tr>
    </thead>
<tbody>

{{--    @foreach($grades as $grade)--}}
{{--        <tr>--}}
{{--            <th>{{$grade->grade}}</th>--}}
{{--            <th>{{$grade->description}}</th>--}}
{{--            <th>{{$grade->addedBy}}</th>--}}

{{--            <th>{{$grade->editedBy}}</th>--}}
{{--            <th>{{$grade->created_at}}</th>--}}
{{--            <th>{{$grade->edited_at}}</th>--}}
{{--            <td><a class="button" href="{{route('grades.edit', $grade->gradeID)}}">Edytuj</a></td>--}}
{{--            <td><a class="button" href="{{route('grades.destroy', $grade->gradeID)}}" onclick="return confirm('Czy jesteś pewien?')">Usuń</a></td>--}}
{{--        </tr>--}}
{{--     @endforeach--}}
    </tbody>
    <a class="button" href="{{route('students.index')}}">Lista uczniów</a>
{{--        <a class="button" href="{{route('grades.index', $iducznia)}}">Dodaj ocenę</a>--}}
</table>
</div>

@endsection