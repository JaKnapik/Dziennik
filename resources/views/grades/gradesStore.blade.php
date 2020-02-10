@extends('layout')

@section('content')
    {{$nameSurname2->name}} {{$nameSurname2->surname}}
    <div class="container">
        <div class="row-no-gutters">
            <div class="col-md-8 col-md-offset-2" >
                <div class="table">
                    <div class="panel-heading"><h1>Dodaj ocenę:</h1></div>
                    <div class="panel-body">
                        {!! Form::open(array('route'=>'grades.store', $nameSurname2->studentID)) !!}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="btn btn-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        {!! Form::label('grade', 'Ocena', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::text('grade', null, ['class' => 'row gtr-uniform'] ) !!}
                        </div>
                        {!! Form::label('description', 'Opis', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::text('description', null, ['class' => 'row gtr-uniform']) !!}
                        </div>
                        <input id="addedBy" name="addedBy" hidden value="{{ Auth::user()->id }}"/>
                        <input id="editedBy" name="editedBy" hidden value="{{ Auth::user()->id }}"/>
                        <input id="studentID" name="studentID" hidden value="{{ $nameSurname2->id}}"/>

                        <div class="form-group" >
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit("Dodaj ocenę", ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection