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
            <a href="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{route("super-admin.dashboard.customer-create-view")}}
            @else
                {{route("admin.dashboard.customer-create-view")}}
            @endif
            " class="btn btn-outline-primary">Add New Customer</a>
        </div>
        <div class="row col-12 text-center">
            <table id="customer_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Car Make</th>
                        <th>Car Model</th>
                        <th>Car Year</th>
                        <th>Car Color</th>
                        <th>View</th>
                        <th>Quotations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->full_name}}</td>
                            <td>{{$customer->phone_number}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->country->name}}</td>
                            <td>{{$customer->city->name}}</td>
                            <td>{{$customer->make->name}}</td>
                            <td>{{$customer->model->name}}</td>
                            <td>{{$customer->year}}</td>
                            <td>{{$customer->color->name}}</td>
                            <td>
                                <a href="
                                @if(auth()->user() instanceof \app\models\SuperAdmin)
                                    {{route("super-admin.dashboard.customer-view",['id' => $customer->id])}}
                                @else
                                    {{route("admin.dashboard.customer-view",['id' => $customer->id])}}
                                @endif
                                " class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>    
                            </td>
                            <td>
                                <a href="
                                @if(auth()->user() instanceof \app\models\SuperAdmin)
                                    {{route("super-admin.dashboard.customer-quotations",['id' => $customer->id])}}
                                @else
                                    {{route("admin.dashboard.customer-quotations",['id' => $customer->id])}}
                                @endif
                                " class="btn btn-outline-warning  view d-block m-2" data-id=""><i class="fa fa-star"></i></a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Car Make</th>
                        <th>Car Model</th>
                        <th>Car Year</th>
                        <th>Car Color</th>
                        <th>View</th>
                        <th>Quotations</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/customer.js")}}></script>
@endsection