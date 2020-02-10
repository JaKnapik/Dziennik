@extends('layout')

@section('content')
    <div class="container">
        <div class="row-no-gutters">
            <div class="col-md-8 col-md-offset-2" >
                <div class="table">
                    <div class="panel-heading"><h1>Edytuj ocenę:</h1></div>
                    <div class="panel-body">
                        {!! Form::model($grade, ['route'=>['grades.update', $grade], 'method' => 'PUT']) !!}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="btn btn-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        {!! Form::label('grade', 'Ocena', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::text('grade',$select[0]->grade, ['class' => 'row gtr-uniform'] ) !!}
                        </div>
                        {!! Form::label('description', 'Opis', ['class' => 'col-md-4']) !!}
                        <div class="form-group">
                            {!! Form::text('description',$select[0]->description, ['class' => 'row gtr-uniform']) !!}
                        </div>
                        <input id="editedBy" name="editedBy" hidden value="{{ Auth::user()->id }}"/>

                        <div class="form-group" >
                            <div class="col-md-8 col-md-offset-4">
                                {!! Form::submit("Edytuj ocenę", ['class'=>'btn btn-primary']) !!}
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