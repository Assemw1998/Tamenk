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
                {{route("super-admin.dashboard.quotation-create-view")}}
            @else
                {{route("admin.dashboard.quotation-create-view")}}
            @endif
            " class="btn btn-outline-primary">Add New Quotation</a>
        </div>
        <div class="row col-12 text-center">
            <table id="quotation_table" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Email</th>
                        <th>Insurance Company Name</th>
                        <th>total</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotations as $quotation)
                        <tr>
                            <td>{{$quotation->id}}</td>
                            <td>{{$quotation->customer->email}}</td>
                            <td>{{$quotation->insuranceCompany->name}}</td>
                            <td>{{$quotation->total}}</td>
                            <td>{{$quotation->created_at}}</td>
                            <td>{{$quotation->updated_at}}</td>
                            <td>
                                <a href="
                                @if(auth()->user() instanceof \app\models\SuperAdmin)
                                    {{route("super-admin.dashboard.quotation-view",['id' => $quotation->id])}}
                                @else
                                    {{route("admin.dashboard.quotation-view",['id' => $quotation->id])}}
                                @endif
                                " class="btn btn-outline-info  view d-block m-2" data-id=""><i class="fa fa-eye"></i></a>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Customer Email</th>
                        <th>Insurance Company Name</th>
                        <th>total</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/quotation.js")}}></script>
@endsection