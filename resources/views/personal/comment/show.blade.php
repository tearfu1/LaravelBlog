@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=" {{ route('personal.main.index') }} ">Home</a></li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ route('personal.comment.index') }}">Comments</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $comment->post->id }}</li>
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
                <div class="row mb-3">
                    <div class="col-1 d-flex">
                        <a href="{{ route('personal.comment.edit', $comment) }}"
                           class="btn btn-block btn-primary mr-3">Edit</a>
                        <form action="{{ route('personal.comment.destroy', $comment) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row w-50">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Post ID</td>
                                        <td>{{ $comment->post->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>{{ $comment->message }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
