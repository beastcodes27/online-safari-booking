@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Buses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.buses.create') }}"> Create New Bus</a>
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
            <th>Bus Name</th>
            <th>Plate Number</th>
            <th>Seats</th>
            <th>Bus Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($buses as $bus)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $bus->bus_name }}</td>
            <td>{{ $bus->plate_number }}</td>
            <td>{{ $bus->seats }}</td>
            <td>{{ $bus->bus_type }}</td>
            <td>
                <form action="{{ route('admin.buses.destroy',$bus->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.buses.show',$bus->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.buses.edit',$bus->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
