@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Schedule</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.schedules.index') }}"> Back</a>
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

    <form action="{{ route('admin.schedules.update',$schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bus:</strong>
                    <select name="bus_id" class="form-control">
                        @foreach ($buses as $bus)
                            <option value="{{ $bus->id }}" @if($bus->id == $schedule->bus_id) selected @endif>{{ $bus->bus_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Route:</strong>
                    <select name="route_id" class="form-control">
                        @foreach ($routes as $route)
                            <option value="{{ $route->id }}" @if($route->id == $schedule->route_id) selected @endif>{{ $route->start_location }} to {{ $route->end_location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departure Time:</strong>
                    <input type="datetime-local" name="departure_time" value="{{ date('Y-m-d\TH:i', strtotime($schedule->departure_time)) }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Arrival Time:</strong>
                    <input type="datetime-local" name="arrival_time" value="{{ date('Y-m-d\TH:i', strtotime($schedule->arrival_time)) }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" value="{{ $schedule->price }}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
