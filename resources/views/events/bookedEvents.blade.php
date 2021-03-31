@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My events') }}</div>

                <div class="card-body">
                    {{-- <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th width="280px">Action</th>
                        </tr> --}}
                        {{-- @foreach ($events as $event)
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
                        @endforeach --}}


                        @if(count($bookings)>0)
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                
                                <th scope="col">Event Name</th>
                                <th scope="col ">Date</th>
                                <th scope="col ">Location</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                              <tr>
                                
                                <td>{{$booking->event_name}}</td>
                                <td>{{$booking->event_date->format('Y-m-d') }}</td>
                                <td>{{$booking->event_location}}</td>
                                <td>
                                  <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                                    @csrf
                                     @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Unbook</button>
                                    </form>
                                </td>
                                <td> 
                                 
                                  
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>

                    </table>
                         
                    @else
                        <h4 class="text-muted">You haven't booked any event</h4>
                        <a class="btn btn-primary" href="{{route('events.index')}} ">See events</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
