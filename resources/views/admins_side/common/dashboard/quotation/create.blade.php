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
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}</h1>
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
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="
        @if(auth()->user() instanceof \app\models\SuperAdmin)
            {{route("super-admin.dashboard.quotation-create")}}
        @else
            {{route("admin.dashboard.quotation-create")}}
        @endif
        " method="POST" autocomplete="off" id="quotation_form">
            @csrf
            <hr>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control selectpicker" data-live-search="true" required>
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}" {{ (old("customer_id") == $customer->id ? "selected":"") }} data-tokens="{{$customer->email}}, {{$customer->phone_number}}">{{$customer->full_name}}</option>
                    @endforeach
                </select>
            </div> 
            <hr>
            <div class="form-group">
                <label for="insurance_company_id">Insurance Company</label>
                <select name="insurance_company_id" id="insurance_company_id" class="form-control selectpicker" data-live-search="true" required>
                    <option value="">Select Insurance Company</option>
                    @foreach($insuranceCompanies as $insuranceCompany)
                    <option value="{{$insuranceCompany->id}}" {{ (old("insurance_company_id") == $insuranceCompany->id ? "selected":"") }}>{{$insuranceCompany->name}}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="insurance_type">Insurance Type</label>
                <select class="form-control" name="insurance_type" id="insurance_type" required>
                    <option value="">Select Insurance Type</option>
                    @foreach(config('constants.insurance_types') as $key=>$value)
                    <option value="{{$key}}" {{ (old("insurance_type") == $key ? "selected":"") }}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="car_value">Car Value</label>
                <input type="number" class="form-control" value="{{old('car_value')}}" name="car_value" id="car_value" required>
                @if ($errors->has('car_value'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('car_value') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-group">
                <label for="personal_accident_benefits_for_driver" class="d-block">Personal Accident Benefits For Driver</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_driver" value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_driver" value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="personal_accident_benefits_for_passenger" class="d-block">Personal Accident Benefits For Passenger</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_passenger" value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_passenger" value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="road_side_assistance_services" class="d-block">Road Side Assistance Services</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="road_side_assistance_services" value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="road_side_assistance_services" value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="rent_a_car" class="d-block">Rent A Car</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="rent_a_car" value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="rent_a_car" value=0 required>No
                    </label>
                </div>
            </div>
            <input type="hidden" name="extra_information_inputs" id="extra_information_inputs" value="">
            <div class="form-group">
                <label for="add_extra_yes_no_questions" class="d-block">Add Extra Yes/No Questions</label>
                <div class="input-group">
                    <input type="text" class="form-control" value="" id="add_extra_yes_no_questions">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-primary generate-questions">Add</button>
                    </div>
                </div>
            </div>
            <div class="questions-area"></div>
            <hr>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" value="{{old('price')}}" name="price" id="price" required>
                @if ($errors->has('price'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="">Vat</label>
                <input type="number" class="form-control" value="{{old('vat')}}" name="vat" id="vat" required>
                @if ($errors->has('vat'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('vat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="number" class="form-control" value="{{old('total')}}" name="total" id="total" required>
                @if ($errors->has('total'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('total') }}</span>
                @endif
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/quotation.js")}}></script>
@endsection