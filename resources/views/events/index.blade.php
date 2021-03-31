@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.alerts')
    <div class="row justify-content-center">
         @foreach ($events as $event)
            <div class="courses-container col-md-6 float-left" >
                    <div class="course" >
                        <div class="course-preview " style="background: url('/storage/cover_images/{{$event->cover_image}}');background-repeat: no-repeat;
                            background-size: cover;backdrop-filter: blur(5px);;background-position: center;">
                            <h6>Event</h6>
                            <h2>{{ $event->name }}</h2>
                            <a href="{{ route('events.show',$event->id) }}">View Event <i class="fas fa-chevron-right"></i></a>
                        </div>
                        <div class="course-info col-md-8">
                            <div class="progress-container">
                                
                                
                            </div>
                            <h6> <i class="bi bi-pin-angle"></i> {{ $event->location }},  {{$event->date->format('d/m/Y') }} </h6>
                            <br>
                            <p>{{ Str::words($event->description, 15) }}</p>
                            <br>
                        </div>
                    </div>
                </div>
                <br>
             @endforeach
        
    </div>
</div>
@endsection



<!-- SOCIAL PANEL HTML -->





{{-- 
    <div class="row container">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
            </div>
        </div>
    </div>
   

   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->date->format('Y-m-d')  }}</td>
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $events->links() !!}
       --}}
