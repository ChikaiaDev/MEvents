@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="row">
        <div class="row margin-tb">
            <div class="pull-left">
                <h2> Event</h2>
            </div>
            <div class="pull-right col-md-4">
                <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
            </div>
            @if(!Auth::guest())
                @if(Auth::user()->id == $event->user_id)
                    <form action="{{ route('events.destroy',$event->id) }}" method="POST" class="col-lg-6">
                    
                        <a class="btn btn-secondary" href="{{ route('events.edit',$event->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                @endif
        @endif
            <br>
        </div>
 
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Event:</strong>
                {{ $event->name }}
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                {{$event->date->format('Y-m-d') }}
            </div>
            <div class="form-group">
                <strong>Location:</strong>
                {{ $event->location }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $event->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <img src="/storage/cover_images/{{$event->cover_image}}" alt="" style="border-radius: 10px; height:500px;">
            </div>
        </div>

    </div>
    <div class="row">
        <form method="POST" action="{{ route('booking.store') }}">
            @csrf
            <input type="hidden" id="event_name" name="event_name" value="{{$event->name}}">
            <input type="hidden" id="event_location" name="event_location" value="{{$event->location}}">
            <input type="hidden" id="event_date" name="event_date" value="{{$event->date}}">
            <input type="hidden" id="event" name="event" value="{{$event->id}}">
            <div class="form-btn">
                <button class="btn btn-success submit-btn">Book your space</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection