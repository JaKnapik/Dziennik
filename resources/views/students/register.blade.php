@extends('layout')

@section('content')
<div class="container">
    <div class="row-no-gutters">
        <div class="col-md-8 col-md-offset-2" style="padding:2% 30% 2% 30%">
            <div class="table">
                <div class="panel-heading"><h1>Rejestracja</h1></div>
                    <div class="panel-body">
                        {!! Form::open(['route'=>'student.store']) !!}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="btn btn-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                            <div class="form-group">
                                {!! Form::label('name', 'Imie', ['class' => 'col-md-4']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('surname', 'Nazwisko', ['class' => 'col-md-4']) !!}
                                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('pesel', 'PESEL', ['class' => 'col-md-4 control-label']) !!}
                                {!! Form::text('pesel', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('section', 'Oddział', ['class' => 'col-md-4 control-label']) !!}
                                <select class="form-control" id="section" name="section">
                                    <option disabled selected value>Wybierz oddział</option>
                                    @foreach($sections as $section)
                                        <option id="{{$section->sectionID}}" value="{{$section->sectionID}}">{{$section->sectionName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input id="edytor" name="edytor" hidden value="{{ Auth::user()->id }}"/>

                            <div class="form-group" style="padding-top: 5%">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit("Zarejestruj", ['class'=>'btn btn-primary']) !!}
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
