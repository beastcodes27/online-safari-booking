@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Bookings</h2>
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
            <th>User</th>
            <th>Bus</th>
            <th>Route</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Seat Number</th>
        </tr>
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->schedule->bus->bus_name }}</td>
            <td>{{ $booking->schedule->route->start_location }} to {{ $booking->schedule->route->end_location }}</td>
            <td>{{ $booking->schedule->departure_time }}</td>
            <td>{{ $booking->schedule->arrival_time }}</td>
            <td>{{ $booking->seat_number }}</td>
        </tr>
        @endforeach
    </table>
@endsection
