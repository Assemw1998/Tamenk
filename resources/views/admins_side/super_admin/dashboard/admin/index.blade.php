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
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="row col-12 text-right mb-4">
            <a href="{{ route('super-admin.dashboard.admin-create-view')}}" class="btn btn-outline-primary">Add New Admin</a>
        </div>
        <div class="row col-12 text-center">
            <table id="admins_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->full_name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->phone_number}}</td>
                        <td>{{$admin->username}}</td>
                        <td><span class="
                        @if($admin->status) bg-success
                        @else bg-danger
                        @endif p-1">{{$admin->status_label}}</span></td>
                        <td>{{$admin->superAdminCreatedBy->full_name}}</td>
                        <td>{{$admin->superAdminUpdatedBy->full_name}}</td>
                        <td>
                            <a href="{{ route('super-admin.dashboard.admin-view',['id' => $admin->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/admin.js")}}></script>
@endsection