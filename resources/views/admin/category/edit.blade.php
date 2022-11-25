@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3>
                    Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control"> {{ $category->description }} </textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" {{ $category->status == '0' ? 'checked' : '' }} />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <input type="text" name="meta_keyword" value="{{ $category->meta_keyword }}" class="form-control" rows="3">
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="3">
                                {{ $category->meta_description }}
                            </textarea>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/uploads/category/' . $category->image) }}" width="60" height="60" alt="no image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
