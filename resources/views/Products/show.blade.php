@extends('layouts.template')

@section('title', "Product: $Product->name")

@section('body')
@if ($Product->avatar)
    <img src="{{ $Product->avatar_url }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">id</th>
            <td>{{ $Product->id }}</td>
        </tr>
        <tr>
            <th scope="row">name</th>
            <td>{{ $Product->name }}</td>
        </tr>
        <tr>
            <th scope="row">desc</th>
            <td>{{ $Product->desc }}</td>
        </tr>
        <tr>
            <th scope="row">retail</th>
            <td>{{ $Product->retail }}</td>
        </tr>
        <tr>
            <th scope="row">whole</th>
            <td>{{ $Product->whole }}</td>
        </tr>
        <tr>
            <th scope="row">origin</th>
            <td>{{ $Product->origin }}</td>
        </tr>
        <tr>
            <th scope="row">quantity</th>
            <td>{{ $Product->quantity }}</td>
        </tr>
    </tbody>
</table>

<div>
    <small>Created at: {{ $Product->created_at }}</small>
    @if ($Product->updated_at)
        <br><small>Updated at: {{ $Product->updated_at }}</small>
    @endif
</div>
@endsection
