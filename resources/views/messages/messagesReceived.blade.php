@extends('layout')

@section('content')

    <div style="margin: 3em 0 0 3em">
        <label style="text-underline: black"><h1>Odebrane wiadomości</h1></label>
    </div>
    <div style="padding: 5em">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Wiadomość</th>
                <th>OD</th>

            </tr>
            </thead>
            <tbody>
            @foreach($messagesReceived as $message)
                <tr>
                    <th>{{$message->text}}</th>
                    <th>{{$message->name}} {{$message->surname}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection