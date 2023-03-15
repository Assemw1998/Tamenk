@extends('admins_side.common.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.admin-index')}}">Admins</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.admin-create')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" value="{{old('full_name')}}" name="full_name" id="full_name" required>
                @if ($errors->has('full_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{old('email')}}" name="email" id="email" required>
                @if ($errors->has('email'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number" id="phone_number" required>
                @if ($errors->has('phone_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{old('username')}}" name="username" id="username" required>
                @if ($errors->has('username'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" value="{{old('customer_password')}}" name="password" id="password" required>
                    <div class="input-group-append">
                        <span class="input-group-text hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <button type="button" class="btn btn-outline-primary generate-password">Generate</button>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/admin.js")}}></script>
@endsection