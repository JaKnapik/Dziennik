@extends('layout')

@section('content')
    <div style="margin: 3em 0 0 3em">
        <label style="text-underline: black"><h1>Lista ocen</h1></label>
    </div>
    <div style="padding: 5em">
        <table class="table">
            <thead>
            <tr>
                <th>Ocena</th>
                <th>Opis</th>
                <th>Wystawiający</th>
                <th>Edytujący</th>
                <th>Wystawione dnia:</th>
                <th>Edytowane dnia:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grades as $grade)
                <tr>
                    <th>{{$grade->grade}}</th>
                    <th>{{$grade->description}}</th>
                    <th>{{$grade->addedBy}}</th>
                    <th>{{$grade->editedBy}}</th>
                    <th>{{$grade->created_at}}</th>
                    <th>{{$grade->edited_at}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{$grades->links()}}
@endsection