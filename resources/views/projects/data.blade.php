@php
    $projects = data_get($results, 'data', []) ?? [];
@endphp
@foreach($projects as $project)
    @php

        $id = data_get($project, 'id');
        $title = data_get($project, 'title');
        $categories = implode(',', data_get($project, 'categories.*.title')) ?? '--';
        $startDate = \Carbon\Carbon::parse(data_get($project, 'start_date'))->format('d F Y') ;
        $endDate = \Carbon\Carbon::parse(data_get($project, 'end_date'))->format('d F Y') ;

    @endphp
    <tr>
        <td>{{ $title }}</td>
        <td>{{ $startDate }}</td>
        <td>{{ $endDate }}</td>
        <td>
            <a href="{{ route('projects.edit',['id' => $id]) }}"><i class="fa fa-edit"></i></a> |
            <a data-id="{{ $id }}" class="delete_project"><i class="fa fa-trash-o"></i></a>
        </td>
    </tr>
@endforeach
