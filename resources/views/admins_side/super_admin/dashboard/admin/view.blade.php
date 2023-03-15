@extends('admins_side.common.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$admin->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.admin-index')}}">Admins</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="col-12 col-lg-6 p-0 mb-2">
            <a class="btn btn-outline-success  col-lg-3 col-12 update mb-2" href="{{ route('super-admin.dashboard.admin-update-view',['id' => $admin->id])}}" data-id="">Update</a>
            <a class="btn btn-outline-danger col-lg-3 col-12 delete mb-2" data-id="{{$admin->id}}">Delete</a>
            <a class="btn btn-outline-info col-lg-3 col-12 mb-2 activate-deactivate" data-id="{{$admin->id}}">{{($admin->status?'Deactivate':'Activate')}}</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Full Name</label>
                    <div>{{$admin->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Email</label>
                    <div>{{$admin->email}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Phone Number</label>
                    <div>{{$admin->phone_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Username</label>
                    <div>{{$admin->username}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Status</label>
                    <div>
                    <span class="
                        @if($admin->status) bg-success
                        @else bg-danger
                        @endif p-1">
                        {{$admin->status_label}}</span></div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>{{$admin->superAdminCreatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Update By</label>
                    <div>{{$admin->superAdminUpdatedBy->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$admin->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$admin->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/admin.js")}}></script>
@endsection