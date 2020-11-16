@extends('layouts.app')

@section('content')
@parent

<div class="card" style="width: 50rem; display:inline-block">
    
    @if(count($Artical)>0)
    @foreach($Artical as $Articals)
    <h2 class="card-title">{{$Articals->name}}</h2>
    <p class="card-text">{{$Articals->description}}</p>
    @endforeach
    <ul class="list-group list-group-flush">
        @foreach($Comment as $comments)
            <div class="card-body">
                    <li class="list-group-item">{{$comments->text}}</li>
                    
                    {{-- <li>{{ $User->name}}</li>   --}}
                    
            </div>
        @endforeach
    </ul>

    <form method="get" action="{!! route('addComment', ['id' => $Id] )!!}">
        {{csrf_field()}}
        <div class="card-body">
        <h4 for="post-name" style="display: inline-block">Add a Comment</h4>
        <input type="text"
                id="comment-text"
                name="comment-text"
                style="width: 500px;"
                required/>
                <input type="submit" value="Add"/>
            
        </div>
    </form>
    @else
        <div class="container">
            <p>there are no posts</p>
        </div>
    @endif
  </div>
@endsection
