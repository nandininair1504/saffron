@extends('layout')

@push('header')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush

@section('content')
    <div class="container mt-3">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-12 mb-3">
                    <h2>Monthly Report</h2>
                    <span style="float: right;">
                        <a class="btn btn-danger" href="{{ route('home') }}">Home</a>
                        <a class="btn btn-warning" href="{{ route('projects.index') }}">Projects</a>
                    </span>
                </div>

            </div>
            <div class="row mb-3">
                <div>
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        const ctx = document.getElementById('chart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($dataSets) !!}
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection


