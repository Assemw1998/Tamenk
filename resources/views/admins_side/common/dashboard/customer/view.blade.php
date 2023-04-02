@extends('admins_side.common.layouts.dashboard')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$customer->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="
                   @if(auth()->user() instanceof \app\models\SuperAdmin)
                        {{route("super-admin.dashboard.customer-index")}}
                    @else
                        {{route("admin.dashboard.customer-index")}}
                    @endif
                   ">Customers</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="col-12 col-lg-6 p-0 mb-2">
            <a class="btn btn-outline-success  col-lg-3 col-12 update mb-2" href="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{route("super-admin.dashboard.customer-update-view",['id' => $customer->id])}}
            @else
                {{route("admin.dashboard.customer-update-view",['id' => $customer->id])}}
            @endif
            " data-id="">Update</a>
            <a class="btn btn-outline-danger col-lg-3 col-12 delete mb-2" data-id="{{$customer->id}}" data-url="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/customer-delete"}}
            @else
                {{"/admin/dashboard/customer-delete"}}
            @endif

            data-url-index="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/customer-index"}}
            @else
                {{"/admin/dashboard/customer-index"}}
            @endif
            ">Delete</a>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Full Name</label>
                    <div>{{$customer->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Phone Number</label>
                    <div>{{$customer->phone_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Email</label>
                    <div>{{$customer->email}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Country</label>
                    <div>{{$customer->country->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>City</label>
                    <div>{{$customer->city->name}}</div>
                </div>
            </li>
            <hr>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Car Make</label>
                    <div>{{$customer->make->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Car Model</label>
                    <div>{{$customer->model->name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Car Year</label>
                    <div>{{$customer->year}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Car Color</label>
                    <div>{{$customer->color->name}}</div>
                </div>
            </li>
            <hr>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created Portal</label>
                    <div>{{$customer->created_portal_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated Portal</label>
                    <div>{{$customer->updated_portal_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>
                        @if($customer->created_portal==1)
                        {{$customer->superAdminCreatedBy->full_name}} #{{$customer->created_by_id}}
                        @else
                        {{$customer->adminCreatedBy->full_name}} #{{$customer->created_by_id}}
                        @endif
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated By</label>
                    <div>
                        @if($customer->updated_portal==1)
                        {{$customer->superAdminUpdatedBy->full_name}} #{{$customer->updated_by_id}}
                        @else
                        {{$customer->adminUpdatedBy->full_name}} #{{$customer->updated_by_id}}
                        @endif
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$customer->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$customer->updated_at}}</div>
                </div>
            </li>
        </ul>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/customer.js")}}></script>
@endsection