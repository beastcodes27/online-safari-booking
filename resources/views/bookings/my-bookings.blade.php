@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Bookings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Book New Trip</a>

                        <hr>

                        @if ($bookings->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Bus</th>
                                        <th scope="col">Route</th>
                                        <th scope="col">Departure Time</th>
                                        <th scope="col">Arrival Time</th>
                                        <th scope="col">Seat Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $booking->schedule->bus->bus_name }}</td>
                                            <td>{{ $booking->schedule->route->start_location }} to {{ $booking->schedule->route->end_location }}</td>
                                            <td>{{ $booking->schedule->departure_time }}</td>
                                            <td>{{ $booking->schedule->arrival_time }}</td>
                                            <td>{{ $booking->seat_number }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no bookings.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
