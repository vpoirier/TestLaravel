@extends('newlayout')
@extends('nav_blog')

@section('content')  

        <form method="POST" action="/posts">
            {{ csrf_field() }}

            {{ Form::label('title', 'Titre: ') }}
            {{ Form::text('title', '', array('required' => 'required')) }}

            {{ Form::label('body', 'Message: ')}}
            {{ Form::textarea('body', '', array('required' => 'required'))  }}

            {{ Form::submit('Créer')}}
        </form>
        <br><br>
        <a href="/home" > <input type="button" value="Retour Accueil"> </a>
@endsection
