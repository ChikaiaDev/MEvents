@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Event Name') }}</label>

                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Event name" >
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
                                <textarea class="form-control  @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="Detail" required></textarea>
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
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" style="width: 100%; display: inline;" required>
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
                                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" >
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cover_image" class="col-md-3 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-9">
                                <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                                @error('cover_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




