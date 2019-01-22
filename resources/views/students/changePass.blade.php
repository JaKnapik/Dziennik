@extends('layout')

@section('content')
    <div class="container">
        <div class="row-no-gutters">
            <div class="col-md-8 col-md-offset-2" >
                <div class="table">
                    <div class="panel-heading"><h1>Wprowadź hasło:</h1></div>
                    <div class="panel-body">
                        {!! Form::model($id, ['route'=>['student.passUp', $id], 'method' => 'PUT']) !!}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="btn btn-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        {!! Form::label('password', 'Hasło', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::password('password',NULL, ['class' => 'row gtr-uniform'] ) !!}
                        </div>
                        {!! Form::label('password', 'Potwierdź hasło', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::password('password_confirmation',NULL, ['class' => 'row gtr-uniform'] ) !!}
                        </div>
                        <input id="editorID" name="editorID" hidden value="{{ Auth::user()->id }}"/>

                        <div class="form-group" >
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit("Akutalizuj hasło", ['class'=>'btn btn-primary']) !!}
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