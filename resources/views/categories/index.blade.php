@extends('layout')

@php

    $categories = data_get($results, 'data');

@endphp

@section('content')
    <div class="container mt-3">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($error = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $error }}</strong>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-sm-8">
                    <h2>Categories</h2>
                </div>
                <div class="col-sm-4" style="float: right;">
                    <a class="btn btn-danger" href="{{ route('home') }}">Home</a>
                    <a id="createCategory" class="btn btn-warning" data-bs-toggle="modal"
                       data-bs-target="#createCategoryModal">Create Category</a>
                </div>
            </div>
        </div>
        @if(!empty($categories))
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th class="text-center">Title</th>
                    <th class="text-center">Projects Count</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody id="data-wrapper">
                @include('categories.data')
                </tbody>
            </table>
            @include('partials.pagination')
        @else
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h5>No Records Found</h5>
                </div>
            </div>
        @endif
    </div>
    @include('categories.create')
@endsection


<script>
    const endpoint = "{{ route('categories.index') }}";
    let page = 1;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
<script src="{{ asset('js/categories.js') }}"></script>

