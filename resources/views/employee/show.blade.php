@extends('layouts.dashboard')

@section('main')
    <div class="card">
        <div class="card-header">{{ $employee->full_name }}</div>
        <div class="card-body">

            <strong>First Name</strong>
            <p>{{ $employee->first_name }}</p>
            <strong>Last Name</strong>
            <p>{{ $employee->last_name }}</p>

            <strong>Email</strong>
            @if(is_null($employee->email))
                <p class="text-gray">No data</p>
            @else
                <p>{{ $employee->email  }}</p>
            @endif

            <strong>Phone</strong>
            @if(is_null($employee->phone))
                <p class="text-gray">No data</p>
            @else
                <p>{{ $employee->phone  }}</p>
            @endif

            <div class="my-3">
                <strong>Company</strong>
                @if($employee->company)
                    <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="{{ $employee->company->name }}" src="{{ $employee->company->logo }}" height="100%">
                        </a>
                        <div class="media-body">
                            <span class="mb-0 text-sm">{{ $employee->company->name }}</span>
                        </div>
                    </div>
                @else
                    <p class="text-gray">No Company</p>
                @endif
            </div>



        </div>
        <div class="card-footer">
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-secondary text-primary">Edit</a>
            <button type="button" class="btn btn-secondary text-danger" data-toggle="modal"
                    data-target="#deleteEmployeeModal">
                Delete
            </button>

        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteEmployeeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="confirm" action="{{ route('employees.destroy', $employee) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                    Are you sure to delete {{ $employee->name }} ?
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
