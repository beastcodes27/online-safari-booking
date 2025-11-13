@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Routes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.routes.create') }}"> Create New Route</a>
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
            <th>Start Location</th>
            <th>End Location</th>
            <th>Distance</th>
            <th>Duration</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($routes as $route)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $route->start_location }}</td>
            <td>{{ $route->end_location }}</td>
            <td>{{ $route->distance }}</td>
            <td>{{ $route->duration }}</td>
            <td>
                <form action="{{ route('admin.routes.destroy',$route->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.routes.show',$route->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.routes.edit',$route->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
