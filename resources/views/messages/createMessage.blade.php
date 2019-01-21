@extends('layout')

@section('content')
Wysyłasz wiadomość do: {{$nameSurname[0]->name}} {{$nameSurname[0]->surname}}

{!! Form::model([$nameSurname[0]], ['route'=>['messages.store', $nameSurname[0]]]) !!}
@if ($errors->any())
    <br>
    @foreach ($errors->all() as $error)
        <div class="btn btn-danger">{{ $error }}</div>
    @endforeach
    <br>
@endif
    {!! Form::label('Treść', 'Treść') !!}
    {!! Form::text('text', null) !!}
<input id="edytor" name="edytor" hidden value="{{ Auth::user()->id }}"/>
{!! Form::submit('Submit', ['class' => 'button']) !!}
{{ Form::close() }}

@endsection