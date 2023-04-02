@extends('admins_side.common.layouts.dashboard')
@section('content')
<link rel="stylesheet" href={{ asset("custom/admins_side/common/css/quotation.css") }} />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$quotation->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="
                   @if(auth()->user() instanceof \app\models\SuperAdmin)
                        {{route("super-admin.dashboard.quotation-index")}}
                    @else
                        {{route("admin.dashboard.quotation-index")}}
                    @endif
                   ">Quotations</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center">
        <div class="col-12 col-lg-6 p-0 mb-2">
            <a class="btn btn-outline-success  col-lg-3 col-12 update mb-2" href="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{route("super-admin.dashboard.quotation-update-view",['id' => $quotation->id])}}
            @else
                {{route("admin.dashboard.quotation-update-view",['id' => $quotation->id])}}
            @endif
            " data-id="">Update</a>
            <a class="btn btn-outline-danger col-lg-3 col-12 delete mb-2" data-id="{{$quotation->id}}" data-url="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/quotation-delete"}}
            @else
                {{"/admin/dashboard/quotation-delete"}}
            @endif
            ">Delete</a>
        </div>
        
        <ul class="list-group list-group-flush">
           
            <li class="list-group-item">
                <div class="form-group">
                    <label>Customer ID</label>
                    <div>{{$quotation->customer_id}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Customer full Name</label>
                    <div>{{$quotation->customer->full_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Customer Phone Number</label>
                    <div>{{$quotation->customer->phone_number}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Customer Email</label>
                    <div>{{$quotation->customer->email}}</div>
                </div>
            </li>
        </ul>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Insurance Company ID</label>
                    <div>{{$quotation->insurance_company_id}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Insurance Company Name</label>
                    <div>{{$quotation->insurance_company_id}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label class=" d-block">Insurance Company Logo</label>
                    @if(isset($quotation->insuranceCompany->companyLogo->logo_url))
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($quotation->insuranceCompany->companyLogo->logo_url) }}">
                    @endif
                </div>
            </li>
        </ul>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Insurance Type</label>
                    <div>{{$quotation->InsuranceTypeValue}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Car Value</label>
                    <div>{{$quotation->car_value}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Personal Accident Benefits For Drivere</label>
                    <div>{{($quotation->personal_accident_benefits_for_driver)?"Yes":"No"}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Personal Accident Benefits For Passenger</label>
                    <div>{{($quotation->personal_accident_benefits_for_passenger)?"Yes":"No"}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Road Side Assistance Services</label>
                    <div>{{($quotation->road_side_assistance_services)?"Yes":"No"}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Rent A Car</label>
                    <div>{{($quotation->rent_a_car)?"Yes":"No"}}</div>
                </div>
            </li>
            @foreach($quotation->extraInformationInputsAsArray as $key=>$value)
            <li class="list-group-item">
                <div class="form-group">
                    <label>{{$key}}</label>
                    <div>{{($value)?"Yes":"No"}}</div>
                </div>
            </li>
            @endforeach
        </ul>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label>Price</label>
                    <div>{{$quotation->price}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Vat</label>
                    <div>{{$quotation->vat}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Total</label>
                    <div>{{$quotation->total}}</div>
                </div>
            </li>
        </ul>
        <hr>   
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
                <div class="form-group">
                    <label>Created Portal</label>
                    <div>{{$quotation->created_portal_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated Portal</label>
                    <div>{{$quotation->updated_portal_name}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created By</label>
                    <div>
                        @if($quotation->created_portal==1)
                        {{$quotation->superAdminCreatedBy->full_name}} #{{$quotation->created_by_id}}
                        @else
                        {{$quotation->adminCreatedBy->full_name}} #{{$quotation->created_by_id}}
                        @endif
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated By</label>
                    <div>
                        @if($quotation->updated_portal==1)
                        {{$quotation->superAdminUpdatedBy->full_name}} #{{$quotation->updated_by_id}}
                        @else
                        {{$quotation->adminUpdatedBy->full_name}} #{{$quotation->updated_by_id}}
                        @endif
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Created At</label>
                    <div>{{$quotation->created_at}}</div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group">
                    <label>Updated At</label>
                    <div>{{$quotation->updated_at}}</div>
                </div>
            </li>
        </ul>
        <hr>   
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/quotation.js")}}></script>
@endsection