@extends('layouts.dashboard')

@section('main')
    <div class="card shadow">
        <div class="card-header border-0">
            <strong class="mb-0">Companies List</strong>
            <a class="btn btn-primary text-white float-right btn-sm" data-toggle="modal"
               data-target="#createCompanyModal">New</a>
        </div>
        @if($companies->count() == 0)
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
                        <th scope="col">Email</th>
                        <th scope="col">Show</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3">
                                        <img alt="{{ $company->name }}" src="{{ $company->logo }}" height="100%">
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ $company->name }}</span>
                                    </div>
                                </div>
                            </th>
                            <td>
                                @if(is_null($company->email))
                                    <p class="text-gray">No data</p>
                                @else
                                    <p>{{ $company->email  }}</p>
                                @endif
                            </td>
                            <td class="">
                                <div class="btn-group">
                                    <a href="{{ route('company.show', $company) }}"
                                       class="btn btn-secondary text-gray btn-sm">Show</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            @if($company->count() > config('ok-tamam.pagination'))
                <div class="card-footer">
                    <div class="float-right">
                        {!! $companies->links() !!}
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
