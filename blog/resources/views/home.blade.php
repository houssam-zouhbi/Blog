@extends('layouts.app')

@section('content')
@parent

<div class="card" style="width: 50rem; display:inline-block">
    
    @if(count($Artical)>0)
        @foreach($Artical as $articals)
    <div class="card-body">
      <a class="navbar-brand" href="{!! route('OnePost', ['id'=>$articals->id]) !!}"  >
    
      <h2 class="card-title">{{$articals->name}}</h2>
    </a>
      <p class="card-text">{{$articals->description}}</p>
     
    </div>
    
    @endforeach
    @else
        <div class="container">
            <p>there are no posts</p>
        </div>
    @endif
  </div>

<div style="float: right; display:inline-block ">

    <form method="get" action="add">
    {{csrf_field()}}
    <div>
    <label for="post-name">Post Name</label>
    <input type="text"
            id="post-name"
            name="post-name"
            required/>
    </div>
    <div>
        <label for="post-description">Post description</label>
        <textarea type="text"
                id="post-desc"
                name="post-desc"
                required></textarea>
    </div>
    <div>
        <input type="submit" value="submit"/>
        </div>
    </form>
</div>
@endsection
