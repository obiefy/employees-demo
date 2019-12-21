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
                <p><a href="{{ $company->website }}" target="_blank">{{ $company->website  }}</a></p>
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
            <button type="button" class="btn btn-secondary text-danger" data-toggle="modal"
                    data-target="#deleteCompanyModal">
                Delete
            </button>

        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="deleteCompanyModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteCompanyModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="confirm" action="{{ route('company.destroy', $company) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                    Are you sure to delete {{ $company->name }} ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
