@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Rejestracja</div>
                <div class="panel-body">
                    {!! Form::open(route('student.store')) !!};
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Imię</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Imię" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" placeholder="Nazwisko" required>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pesel') ? ' has-error' : '' }}">
                            <label for="pesel" class="col-md-4 control-label">PESEL</label>

                            <div class="col-md-6">
                                <input id="pesel" type="text" class="form-control" name="pesel" placeholder="PESEL" required>

                                @if ($errors->has('pesel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pesel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">--}}
                            {{--<label for="class" class="col-md-4 control-label">Klasa</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="class" type="text" class="form-control" name="class" placeholder="Klasa (np.2)" required>--}}

                                {{--@if ($errors->has('class'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('class') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">--}}
                            {{--<label for="section" class="col-md-4 control-label">Oddział</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="section" type="text" class="form-control" name="section" placeholder="Oddział (np.2A)" required>--}}

                                {{--@if ($errors->has('section'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('section') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="ifNewClass" class="col-md-4 control-label">Stwórz nową klasę</label>

                            <div class="col-md-6">
                                <input id="ifNewClass" type="checkbox" class="form-control" name="ifNewClass">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Zarejestruj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
