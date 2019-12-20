@extends('layouts.dashboard')

@section('main')
    <div class="card">
        <div class="card-header">{{ $company->name }}</div>
        <div class="card-body">
            <img src="{{ $company->logo }}" alt="{{ $company->logo }}" width="250px"
                 class="mb-3 img-fluid rounded shadow-lg">
            <br>
            <strong>Website</strong>
            @if(is_null($company->website))
                <p class="text-gray">No data</p>
            @else
                <p><a href="{{ $company->website }}">{{ $company->website  }}</a></p>
            @endif

            <strong>Email</strong>
            @if(is_null($company->email))
                <p class="text-gray">No data</p>
            @else
                <p>{{ $company->email  }}</p>
            @endif

        </div>
        <div class="card-footer">
            <a href="{{ route('company.edit', $company) }}" class="btn btn-secondary text-primary">Edit</a>
        </div>
    </div>
@endsection
