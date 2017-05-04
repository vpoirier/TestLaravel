@extends('newlayout')
@extends('nav_blog')

@section('content')    
      <?php $post = session('post') ?> 


            {!! Form::open(['action' => ['PostController@edit', $post->id], 'method' => 'get']) !!}
              {{ Form::label('title', 'Titre: ') }}
              {{ Form::text('title', $post->title, array('required' => 'required')) }}

              {{ Form::label('body', 'Message: ')}}
              {{ Form::textarea('body', $post->body, array('required' => 'required'))  }}

              {!! Form::submit('Modifier', ['class'=>'btn btn-danger btn-mini']) !!}
            {!! Form::close() !!}

 

     <br><br>
     <a href="/home" > <input type="button" value="Retour Accueil"> </a>


@endsection
