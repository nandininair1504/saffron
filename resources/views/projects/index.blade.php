@extends('layout')

@php

    $projects = data_get($results, 'data');

@endphp

@section('content')
    <div class="container mt-3">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-sm-4">
                    <h2>All Projects @if(!empty($title))
                            under {{ strtoupper($title) }}
                        @endif</h2>
                </div>
                @if(empty($title))
                    <div class="col-sm-4">
                        <form method="get" action="">
                            <select class="form-control" id="category">
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ data_get($category,'slug') }}">{{ data_get($category, 'title') }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                @endif
                <div class="col-sm-4">
                    <a href="{{ route('projects.create') }}" class="btn btn-warning">
                        Create Project
                    </a>
                    <a class="btn btn-danger" href="{{ route('home') }}">Home</a>
                </div>
            </div>
        </div>
        @if(!empty($projects))
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="data-wrapper">
                    @include('projects.data')
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
@endsection
<script>
    @if(empty($slug))
        let endpoint = "{{ route('projects.index') }}";
    @elseif(!empty($slug))
        let endpoint = "{{ route('projects.category', ['category_slug' => $slug]) }}";
    @else
        let endpoint = "{{ route('projects.category', ['category_slug' => $search]) }}";
    @endif
    let page = 1;
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/projects.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>


