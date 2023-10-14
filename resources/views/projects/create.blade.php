@extends('layout')
@php
    $now = \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('m/d/Y') ;
@endphp
@section('content')
    <div class="container mt-3">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-4">
                    <h2>Create Project</h2>
                </div>
            </div>
            <div class="row mb-3">
                <form enctype="multipart/form-data" id="#createProjectForm" method="post" class="row g-3 needs-validation" autocomplete="off" action="{{ route('projects.create') }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter a title.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter description" required></textarea>
                        <div class="invalid-feedback">
                            Please enter a description.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categories</label>
                        <select name="category[]" multiple class="form-select" required aria-label="Category" >
                           @foreach($categories as $category)
                                <option value="{{ data_get($category, 'id') }}">{{ data_get($category, 'title') }}</option>
                           @endforeach
                        </select>
                        <div class="invalid-feedback">Please select a category</div>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Image</label>
                        <input type="file" accept="image/*" name="image_path" class="form-control" aria-label="image" >
                        <div class="invalid-feedback">Please upload a valid image file</div>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="text" value="{{ $now }}" name="start_date" id="start_date" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter a start date.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="text" value="{{ $now }}" name="end_date" id="end_date" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter a end date.
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="status" class="form-check-input" id="status">
                        <label class="form-check-label"  for="status">Publish?</label>
                    </div>
                    <div class="mb-3 text-center">
                        <a class="btn btn-danger" href="{{ route('home') }}">Home</a>
                        <button class="btn btn-warning" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('js/projects.js') }}"></script>


