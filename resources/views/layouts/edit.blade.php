@extends('layouts.app')

@section('title', 'Edit blog')

@section('content')
    <aside class="aside">
        <div class="content">
            <div class="aside-breadcrumb">
                Home > <span class="aside-breadcrumb-title">Edit Blog</span>
            </div>
            <div class="aside-container">
                <h3 class="aside-title ">Edit Blog</h3>
                <form action="{{ route('user.update', ['blog' => $blog->id]) }}" class="aside-form" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="aside-form-group">
                        <label for="" class="aside-label"></label>
                    </div>
                    <div class="aside-form-group">
                        <label for="" class="aside-label">Category
                            <span class="aside-label-start">*</span>
                        </label>
                        <select class="form-select aside-form-category" aria-label="Default select example"
                            name='categoryId'>
                            <option value="" selected hidden>Select category</option>
                            @foreach ($categories as $id => $title)
                                <option value="{{ $id }}"
                                    @if ($blog->category_id == $id) {{ 'selected' }} @endif>{{ $title }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoryId')
                            <p class="mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="aside-form-group">
                        <label for="title" class="aside-label">Title
                            <span class="aside-label-start">*</span>
                        </label>
                        <input type="text" class="form-control aside-form-title mb-3" id="title" placeholder="Title"
                            name='title' value="{{ $blog->title }}" />
                        @error('title')
                            <p class="mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="aside-form-group">
                        <p class="aside-label-upload">Upload image</p>
                        <label for="image" class="aside-form-fileImage">Upload Image</label>
                        <input type="file" class="form-control aside-form-file" id="image" name='image' />
                        <img id="photo" src="{{ $blog->image }}" alt="aside-form-image" class="aside-form-image"
                            onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';" />
                        @error('image')
                            <p class="mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="aside-form-group">
                        <label for="description" class="aside-label">Description
                            <span class="aside-label-start">*</span>
                        </label>
                        <textarea class="form-control aside-form-description" id="description" rows="3" name='content'>{{ $blog->content }}</textarea>
                        @error('content')
                            <p class="mt-2 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="aside-form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </aside>
@endsection
