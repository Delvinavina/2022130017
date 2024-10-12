@extends('layouts.template')

@section('title', 'Register New Product')

@section('body')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Register New Product</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" id="id"  placeholder="id" name="id" required value="{{ old('id') }}">
        </div>

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name"  placeholder="name" name="name" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="desc">desc</label>
            <input type="text" class="form-control" id="desc"  placeholder=" desc" name="desc" value="{{ old('desc') }}">
        </div>

        <div class="form-group">
            <label for="retail">retail</label>
            <input type="text" class="form-control" id="retail"  placeholder="retail" name="retail" value="{{ old('retail') }}">
        </div>

        <div class="form-group">
            <label for="whole">whole</label>
            <input type="text" class="form-control" id="whole"  placeholder="whole" name="whole" value="{{ old('whole') }}">
        </div>

        <div class="form-group">
            <label for="origin">origin</label>
            <input type="text" class="form-control" id="origin"  placeholder="origin" name="origin" value="{{ old('origin') }}">
        </div>

        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="text" class="form-control" id="quantity"  placeholder="quantity" name="quantity" value="{{ old('quantity') }}">
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control" id="avatar"  name="avatar">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
