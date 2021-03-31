@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>

                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Edit Event</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
        <form action="{{ route('events.update',$event->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="row">
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Event Name') }}</label>

                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Event name" value="{{$event->name}}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


            

                <div class="form-group row">
                    <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-9">
                        <textarea class="form-control  @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="Detail" required>{{$event->description}}"</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-md-3 col-form-label text-md-right">{{ __('Date') }}</label>

                    <div class="col-md-4">
                        <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" style="width: 100%; display: inline;" required value="{{$event->date->format('Y-m-d') }}">
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Location') }}</label>

                    <div class="col-md-9">
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" value="{{$event->location}}" >
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                

                
        

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
    
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection