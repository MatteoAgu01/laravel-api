@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('admin.projects.index') }}">Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.projects.create') }}">create</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
