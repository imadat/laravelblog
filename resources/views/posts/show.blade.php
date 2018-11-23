@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Go Back</a>
            <div class="card card-block bg-faded" style="padding:50px; margin:30px">
                <h3>{{$post->title}}</h3>
                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                <p>{!!$post->body!!}</p>
                <hr>
                <small>Written on {{$post->created_at}} By {{$post->user->name}}</small>
                <hr>
                @auth
                    @if(Auth::user()->id == $post->user_id)
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    @endif
                @endauth
            </div>
@endsection