@extends('layout')

@section('content')
    <div style="margin: 3em 0 0 3em">
        <label style="text-underline: black"><h1>Odebrane wiadomości</h1></label>
    </div>
    <div style="padding: 5em">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Pesel</th>
                <th>Imię i Nazwisko</th>
                <th>Hasło</th>

            </tr>
            </thead>
            <tbody>
            @foreach($paski as $p)
                <tr>
                    <th>{{$p->pesel}}</th>
                    <th>{{$p->name}} {{$p->surname}}</th>
                    <th>{{$p->temp}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection