@extends('layouts.ext_admin')
@section('content2')
    <header class="mb-4 d-flex">
        <h2 class="mb-4 fs-3">Users Message</h2>
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
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($message as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->username }} </td>
                    <td>{{ $item->email }} </td>
                    <td>{{ $item->phone }} </td>
                    <td>{{ $item->department }} </td>
                    <td>{{ $item->message }} </td>
                    <td>
                        <form action="{{ route('message.destroy', $item->id) }}" method="post">
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

@endsection
