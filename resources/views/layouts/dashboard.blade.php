@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3 pl-5">
            <div class="list-group">
                <a href="{{ route('company.index') }}" class="list-group-item list-group-item-primary">
                    Manage Companies
                </a>
                <a href="" class="list-group-item">
                    Manage Employees
                </a>
            </div>
        </div>
        <div class="col-md-9 pr-5">
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
