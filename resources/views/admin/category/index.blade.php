@extends('admin.layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    Category
                </div>

                <div class="col-lg-2">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm text-white">Create</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created_by</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{asset('uploads/categories/'.$category->image) }}" target="_blank">
                                    <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="{{ $category->name }}"
                                    width="50" height="50">
                                </a>

                            </td>
                            <td>true</td>
                            <td>11-12-2024</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm text-white">View</a>
                                <a href="#" class="btn btn-success btn-sm text-white">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
