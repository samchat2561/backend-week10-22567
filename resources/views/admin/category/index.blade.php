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
                {{session('success')}}
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
                    <tr>
                        <td>101</td>
                        <td>Mobile</td>
                        <td>Mobile detail</td>
                        <td>Image</td>
                        <td>true</td>
                        <td>11-12-2024</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm text-white">View</a>
                            <a href="#" class="btn btn-success btn-sm text-white">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
