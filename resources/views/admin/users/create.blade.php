@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Create user</li>
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
                        <form action=" {{ route('admin.user.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control"
                                       placeholder="Your beautiful username">
                                @error('name')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Your beautiful e-mail">
                                @error('email')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Your beautiful password">
                                @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <input type="submit" class="btn btn-block btn-primary w-25" value="Create">
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
