@extends('layouts.app')

@section('content')
    <div>
        <ul>
            @foreach ($types as $type)
                <li>{{ $type->name }}
                    <ul>
                        @foreach ($type->projects as $project)
                            <li>{{ $project->title }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
