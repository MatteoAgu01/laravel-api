@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col pt-5">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Type / ID</th>
                            <th>Edit</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->type->name }} / {{ $project->type_id }}</td>
                            <td><a  class="btn btn-primary p-1 py-0" href="{{ route('admin.projects.show', $project->slug) }}">Edit</a></td>
                            <td><a  class="btn btn-success p-1 py-0" href="{{ route('admin.projects.create')}}">Create</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
