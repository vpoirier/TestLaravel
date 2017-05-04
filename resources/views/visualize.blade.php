@extends('newlayout')
@extends('nav_blog')

@section('content')    
        <form method="GET" action="/seeposts">
            {{Form::select('orderBy', array('title' => 'Titre','body'=>'Message', 'mark' => 'Note', 'author' => 'Auteur', 'created_at' => 'Date'), 'created_at') }}
            {{Form::submit('Trier')}}
        </form>

        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{$post->title}}</h2>
                <p class="blog-post-meta">Créé le {{$post->created_at}} <a href="#">, par {{$post->author}}</a></p>
                {{  $post->body  }}<br><br>
                <strong>Note : {{ $post->getAverageMark() }}</strong>
            </div>

            @if(Auth::user()->name == $post->author) 
              {!! Form::open(['action' => ['PostController@delete', $post->id], 'method' => 'delete', 'style'=>'display:inline-block']) !!}
                {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
              {!! Form::close() !!} 
            

              {!! Form::open(['action' => ['PostController@showPostToEdit', $post->id], 'method' => 'get', 'style'=>'display:inline-block']) !!}
                {!! Form::submit('Modifier', ['class'=>'btn btn-primary btn-mini']) !!}
              {!! Form::close() !!} 
            @endif

            <form method="POST" action="/addmark">
              {{ csrf_field() }}
              {{ Form::select('valueMark', array(0, 1, 2, 3, 4, 5), 0) }}
              {{ Form::hidden('id_post', $post->id) }}
              {{ Form::hidden('id_user', Auth::user()->id) }}
              {!! Form::submit('Noter', ['class'=>'btn btn-info btn-xs']) !!}
            </form>

            <hr>
        @endforeach    

     <br><br>
     <a href="/home" > <input type="button" value="Retour Accueil"> </a>


@endsection
