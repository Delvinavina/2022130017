@extends('layouts.template')

@section('title', 'Product List')

@section('body')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Product</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Create New Product</a>
</div>

@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">desc</th>
                <th scope="col">retail</th>
                <th scope="col">whole</th>
                <th scope="col">origin</th>
                <th scope="col">quantity</th>
                <th scope="col">Created At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($Product as $Product)
            <tr>
                <th scope="row">{{  $Product->id }}</th>
                <td>
                    <a href="{{ route('products.show', $Product) }}">
                    {{ $Product->name }}
                    </a>
                </td>
                <td>{{ Str::limit($Product->desc, 50, '...') }}</td>
                <td>{{ $Product->retail }}</td>
                <td>{{ $Product->whole }}</td>
                <td>{{ $Product->origin }}</td>
                <td>{{ $Product->quantity }}</td>
                <td>{{ $Product->phone_number }}</td>
                <td>{{ $Product->created_at }}</td>
                <td>{{ $Product->updated_at }}</td>
                <td>
                    <a href="{{ route('products.edit' , $Product)}}" class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action={{ route('products.destroy' , $Product)}} method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(Are you sure?)">Delete</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Product found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $Product->links() !!}
    </div>
</div>
@endsection
