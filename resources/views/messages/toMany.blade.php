@extends('layout')

@section('content')
    <div class="row">
        <div class="column">
            <div class="inner">
                <h2 class="major">Lista uczniów</h2>
                <input class="getinfo" id="search" type="text" name="search" placeholder="Wyszukaj..." onkeyup="ajaxPostForm('studentContainer');">
                {{ csrf_field() }}
                <div class="studentContainer" id="studentContainer">
                    @include('students.studentShort')
                </div>
                <div class="writeinfo"></div>
            </div>

        </div>
        <div class="column">
            <div class="inner">
                <h2 class="major">Wybrani uczniowie</h2>
                <div class="studentContainer2" id="studentContainer2">
                    @include('students.studentsSelected')
                </div>

            </div>
        </div>
    </div>
    {!! Form::open(['route'=>['messages.sendToMany']]) !!}
    <div class="form-group">
        {!! Form::label('text', ' &nbsp;Treść', ['class' => 'col-md-4 control-label']) !!}
        {!! Form::text('text', null, ['class' => 'form-control']) !!}
    </div>
    <input id="edytor" name="edytor" hidden value="{{ Auth::user()->id }}"/>
    {!! Form::submit("Wyślij", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection