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
            <a href="{{ route('super-admin.dashboard.car-make-create-view')}}" class="btn btn-outline-primary">Add New Car Make</a>
        </div>
        <div class="row col-12 text-center">
            <table id="car_make_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Car Make Name</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carMakes as $carMake)
                        <tr>
                            <td>{{$carMake->id}}</td>
                            <td>{{$carMake->name}}</td>
                            <td>{{$carMake->superAdminCreatedBy->full_name}}</td>
                            <td>{{$carMake->superAdminUpdatedBy->full_name}}</td>
                            <td>{{$carMake->created_at}}</td>
                            <td>{{$carMake->updated_at}}</td>
                            <td>
                                <a href="{{ route('super-admin.dashboard.car-make-view',['id' => $carMake->id])}}" class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Car Make Name</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/carMake.js")}}></script>
@endsection