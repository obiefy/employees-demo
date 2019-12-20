@extends('layouts.app')

@section('content')
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">{{ __('company.name') }}</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="logo">{{ __('company.logo') }}</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>

        <button class="btn btn-primary">Create</button>
    </form>
@endsection
