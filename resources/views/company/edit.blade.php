@extends('layouts.dashboard')

@section('main')
    <div class="card">
        <div class="card-header">Edit {{ $company->name }}</div>
        <form action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website" name="website" value="{{ $company->website }}">
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" accept="image/*" class="form-control" id="logo" name="logo">
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('company.show', $company) }}" class="btn btn-secondary text-gray">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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
