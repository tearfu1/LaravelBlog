@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Comment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ route('personal.comment.index') }}">Comments</a></li>
                            <li class="breadcrumb-item active">Edit Comment</li>
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
                        <form action=" {{ route('personal.comment.update', $comment) }}" method="POST" class="w-25">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control">{{ $comment->message }}</textarea>
                                @error('title')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <input type="submit" class="btn btn-block btn-primary w-25" value="Edit">
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
