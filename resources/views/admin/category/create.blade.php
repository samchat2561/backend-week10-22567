@extends('admin.layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            Add category
        </div>
        <div class="card-body p-4">

            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Category Name">
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control" placeholder="Category Slug">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" value="{{ old('image') }}" class="form-control" placeholder="Category Image">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="checkbox" name="status" id="status">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary btn-sm text-white w-100">Save Category</button>
                </div>

            </form>
        </div>
    </div>
@endsection
