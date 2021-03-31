@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to MEvents</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>


      <section>
        <h2 class="text-center">Latest Events</h2>
        <div class="card-deck">
          @foreach ($events as $event)
          <div class="card" href="{{route('events.show',$event)}}" style="height:300px">
            <img src="/storage/cover_images/{{$event->cover_image}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$event->name}}</h5>
              <p class="card-text">{{Str::words($event->description,15)}}</p>
              <div class="float">
                <p class="card-text float-left"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="{{route('events.show',$event)}}" class="card-text float-right" ><small class="text-muted"> Go to event   >></small></a>
              </div>
              
            </div>
          </div>
   
          @endforeach
          
          
        </div>
      </section>
</div>
<br>
@endsection
