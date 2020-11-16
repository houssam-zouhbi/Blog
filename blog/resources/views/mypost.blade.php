@extends('layouts.app')

@section('content')

<div class="card" style="width: 50rem; display:inline-block">
    
    @if(count($Artical)>0)
        @foreach($Artical as $articals)
        <div class="card-body">
            
          <h2 class="card-title">{{$articals->name}}</h2>
          <p class="card-text">{{$articals->description}}</p>
          <a class="navbar-brand" href="{!! route('delete', ['id'=>$articals->id]) !!}" >
            Delete
          </a>
        </div>
        @endforeach

    @else
        <div class="container">
            <p>there are no posts</p>
        </div>
    @endif
  </div>
  @endsection