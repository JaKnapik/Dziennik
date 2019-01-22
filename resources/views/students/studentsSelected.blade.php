<table>
    <thead>
    <tr>

        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Oddział</th>
        <th>Oddznacz</th>
    </tr>
    </thead>
    <tbody id="myTable">
    {!! Form::open( ['route'=>['messages.sendToMany']]) !!}
    @if($students!=null)
    @foreach($students as $u)
        <tr>

            <th>{{$u->name}}</th>
            <th>{{$u->surname}}</th>
            <th>{{$u->sectionName}}</th>
            <th>
                <button id="{{$u->id}}" class="button" style="padding-top: 1px" onclick="submitToLeft({{$u->id}})">Usuń</button>
            </th>
        </tr>
    @endforeach
    @endif
    {!! Form::close() !!}
    </tbody>
</table>
