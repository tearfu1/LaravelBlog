@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Edit user</li>
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
                        <form action=" {{ route('admin.user.update', $user) }}" method="POST" class="w-25">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ $user->name }}">
                                @error('name')
                                <p class="text-danger"> {{ $message }}</p>
                                @enderror()
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ $user->email }}">
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
                            <div class="form-group w-25">
                                <label>Select Role</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option
                                            value="{{ $id }}"
                                            {{ $id == $user->role ? 'selected' : '' }}
                                        >{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
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
