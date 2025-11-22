@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Schedules</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.schedules.create') }}"> Create New Schedule</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Bus</th>
            <th>Route</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Price</th>
            <th>Available Seats</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $schedule->bus->bus_name }}</td>
            <td>{{ $schedule->route->start_location }} to {{ $schedule->route->end_location }}</td>
            <td>{{ $schedule->departure_time }}</td>
            <td>{{ $schedule->arrival_time }}</td>
            <td>{{ $schedule->price }}</td>
            <td>{{ $schedule->available_seats }}</td>
            <td>
                <form action="{{ route('admin.schedules.destroy',$schedule->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.schedules.show',$schedule->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.schedules.edit',$schedule->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
