<table>
    <thead>
    <tr>

        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Oddział</th>
        <th>Zaznaczenie</th>
    </tr>
    </thead>
    <tbody id="myTable">
    {!! Form::open( ['route'=>['messages.storeToMany']]) !!}

    @foreach($userList as $s)
        <tr>

        <th>{{$s->name}}</th>
        <th>{{$s->surname}}</th>
        <th>{{$s->sectionName}}</th>
        <th>
            <label class="checkbox-inline" style="padding-top: 5px">
                <input type="checkbox" id="{{$s->id}}" name="checkbox[]" value="{{$s->id}}" onclick="submitToRight({{$s->id}}, 'studentContainer2')">
                <label for="{{$s->id}}">
                    {{ csrf_field() }}
                </label>
            </label>
        </th>
        </tr>
    @endforeach
    {{ csrf_field() }}
    {!! Form::close() !!}
    </tbody>
    {!! Form::open(['route'=>['messages.reset']]) !!}
    {!! Form::submit("Resetuj", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
</table>
