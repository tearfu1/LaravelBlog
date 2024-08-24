@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Create post</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class=" row">
                    <div class="col-12">
                        <form action=" {{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Your beautiful title">
                                @error('title')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <div class="col-12 pl-0">
                                <textarea id="summernote" name="content">
                                Place <em>some</em> <u>text</u> <strong>here</strong>
                                </textarea>
                                @error('content')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <div class="form-group w-50">
                                <div class="form-group">
                                    <label>Preview image input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @enderror()
                                </div>
                                <div class="form-group">
                                    <label>Main image input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="main_image" class="custom-file-input">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <p class="text-danger"> {{ $message }}</p>
                                    @enderror()
                                </div>
                            </div>
                            <div class="form-group w-25">
                                <label>Select Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                                            >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary w-25" value="Create">
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection