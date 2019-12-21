@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 pl-5">
            <div class="list-group">
                <a href="{{ route('companies.index') }}" class="list-group-item {{ request()->is('companies*') ? 'list-group-item-primary' : '' }}">
                    Manage Companies
                </a>
                <a href="{{ route('employees.index') }}" class="list-group-item {{ request()->is('employees*') ? 'list-group-item-primary' : ''}}">
                    Manage Employees
                </a>
            </div>
        </div>
        <div class="col-md-9 pr-5">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('main')
        </div>
    </div>
@endsection
