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
    <div class="col-sm-12 d-flex justify-content-center">
        <h6 class="bg-warning w-25 text-center rounded-pill">Total Quotation: {{count($quotations)}}</h6>
    </div>

    <section class="mt-3 content text-dark center">
        <div class="col-12 col-lg-6 p-0 mb-2">
            <a class="btn btn-dark  col-lg-3 col-12 create-pdf mb-2" href="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{route("super-admin.dashboard.customer-quotation-create-pdf",['id' => $customer->id])}}
            @else
                {{route("admin.dashboard.customer-quotation-create-pdf",['id' => $customer->id])}}
            @endif
            " data-id="">Create PDF</a>
            <button class="btn btn-info col-lg-3 col-12 send-email mb-2" data-url="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/customer-quotation-send-email"}}
            @else
                {{"/admin/dashboard/customer-quotation-send-email"}}
            @endif
            " data-id="{{$customer->id}}" >Send Email</a>
           
        </div>
        <hr>
        @forelse ($quotations as $quotation)
        <a href="
        @if(auth()->user() instanceof \app\models\SuperAdmin)
            {{route("super-admin.dashboard.quotation-view",['id' => $quotation->id])}}
        @else
            {{route("admin.dashboard.quotation-view",['id' => $quotation->id])}}
        @endif
        " class="h4 p-3">Quotation #{{$quotation->id}}</a>
        <ul class="list-group list-group-flush">

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
                        <div>{{$quotation->insuranceCompany->name}}</div>
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

        </ul>
        <hr>
        @empty
        <h6 class="p-3">There is no quotation for this customer <a href="
            @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{route("super-admin.dashboard.quotation-create-view")}}
            @else
                {{route("admin.dashboard.quotation-create-view")}}
            @endif
            ">create quotation</a></h6>
        @endforelse
    </section>

</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/customer.js")}}></script>
@endsection