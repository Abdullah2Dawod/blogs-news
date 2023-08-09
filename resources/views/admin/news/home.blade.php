@extends('layouts.ext_admin')
@section('content2')
    <header class="mb-4 d-flex">
        <h2 class="mb-4 fs-3">News </h2>
        <div class="ml-auto">
            <a href="{{ route('admin.create') }}" type="button" class="btn btn-info p-2">Create News
                <i class="fas fa-plus"></i></a>
        </div>
    </header>


    @if (session('update'))
    <div class="alert alert-{{ session('type') }}" style="font-family: 'Cairo', sans-serif;font-size: 18px">
        <i class="fa fa-check" aria-hidden="true"></i>
    {{ session('update') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>News Source</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($new as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }} </td>
                    <td><img src="{{ $item->image_url }}" width="70px" height="70px"></td>
                    <td>{{ $item->description }} </td>
                    <td>{{ $item->news_source }} </td>
                    <td><a href="{{ route('admin.edit', $item->id) }}" class="btn-sm btn btn-outline-secondary">
                            <i class="far fa-edit"></i< /a>
                    </td>
                    <td>
                        <form action="{{ route('admin.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $new->links() }}

@endsection
