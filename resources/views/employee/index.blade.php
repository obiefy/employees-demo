@extends('layouts.dashboard')

@section('main')
    <div class="card shadow">
        <div class="card-header border-0">
            <strong class="mb-0">Employees List</strong>
            <a href="{{ route('employees.create') }}" class="btn btn-primary text-white float-right btn-sm">New</a>
        </div>
        @if($employees->count() == 0)
            <div class="card-body">
                <div class="alert alert-light">
                    No Items founded,
                    <a class="btn btn-primary text-white float-right btn-sm" data-toggle="modal"
                       data-target="#createCompanyModal">Create New</a>
                </div>
            </div>
        @else
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Company</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Show</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">
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
                            </th>
                            <td>
                                {{ $employee->full_name }}
                            </td>
                            <td>
                                @if(is_null($employee->phone))
                                    <p class="text-gray">No data</p>
                                @else
                                    <p>{{ $employee->phone  }}</p>
                                @endif
                            </td>
                            <td class="">
                                <div class="btn-group">
                                    <a href="{{ route('employees.show', $employee) }}"
                                       class="btn btn-secondary text-gray btn-sm">Show</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            @if($employees->total() > config('ok-tamam.pagination'))
                <div class="card-footer">
                    <div class="float-right">
                        {!! $employees->links() !!}
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Create Company Modal -->
    <div class="modal fade" id="createCompanyModal" tabindex="-1" role="dialog"
         aria-labelledby="createCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-lighter">
                    <h5 class="modal-title" id="createCompanyModalLabel">New Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <create-company></create-company>
                </div>
            </div>
        </div>
    </div>
@endsection
