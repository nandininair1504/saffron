@php
    $categories = data_get($results, 'data', []) ?? [];
@endphp

@foreach($categories as $category)
    @php

        $id = data_get($category, 'id');
        $title = data_get($category, 'title');
        $slug = data_get($category, 'slug');
        $projectCount = data_get($category, 'projects') ? count(data_get($category, 'projects')) : 0;

    @endphp
    <tr>
        <td class="text-center">{{ $title }}</td>
        <td class="text-center"><a href="{{ route('projects.category', ['category_slug' => $slug]) }}"><span class="badge rounded-pill bg-secondary">{{ $projectCount }}</span></a></td>
        <td class="text-center">
            <a data-bs-toggle="modal" data-bs-target="#editCategoryModal_{{ $id }}"><i class="fa fa-edit"></i></a> |
            <a data-id="{{ $id }}" class="delete_category"><i class="fa fa-trash-o"></i></a></td>
        <td>
            @include('categories.edit')
        </td>
    </tr>
@endforeach

