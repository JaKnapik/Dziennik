@extends ('layout')

@section('content')

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>Dziennik elektroniczny</h2>
            <p>Kontroluj swoje oceny<br />
                <ul class="actions special">
                @if(Auth::guest()==true)
                    <li><a href="login" class="button primary">Zaloguj</a></li>
                @endif
                @if(Auth::guest()==false)
                    @if(Auth::user()->role == 'user')
                        <li><a href="{{route('grades.showUser',[Auth::User()->id])}}" class="button primary">Pokaż oceny</a></li>
                    @endif
                    @if(Auth::user()->role == 'admin')
                        <li><a href="{{route('students.index')}}" class="button primary">Pokaż listę uczniów</a></li>
                    @endif
                @endif
            </ul>
        </div>
        <a href="#one" class="more scrolly">Learn More</a>
    </section>
@endsection