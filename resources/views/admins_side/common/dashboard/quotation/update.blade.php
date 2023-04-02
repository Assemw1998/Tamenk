@extends('admins_side.common.layouts.dashboard')
@section('content')
@php $counter=0; @endphp
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
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="
        @if(auth()->user() instanceof \app\models\SuperAdmin)
            {{route("super-admin.dashboard.quotation-update",['id' => $quotation->id])}}
        @else
            {{route("admin.dashboard.quotation-update",['id' => $quotation->id])}}
        @endif
        " method="POST" id="quotation_form" autocomplete="off">
            @csrf
            <hr>
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control selectpicker" data-live-search="true" required>
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$quotation->customer_id}}" @if($customer->id==$quotation->customer_id){{"selected"}}@endif data-tokens="{{$customer->email}}, {{$customer->phone_number}}">{{$customer->full_name}}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="insurance_company_id">Insurance Company</label>
                <select name="insurance_company_id" id="insurance_company_id" class="form-control selectpicker" data-live-search="true" required>
                    <option value="">Select Insurance Company</option>
                    @foreach($insuranceCompanies as $insuranceCompany)
                    <option value="{{$quotation->insurance_company_id}}" @if($insuranceCompany->id==$quotation->insurance_company_id){{"selected"}}@endif>{{$insuranceCompany->name}}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="insurance_type">Insurance Type</label>
                <select class="form-control" name="insurance_type" id="insurance_type" required>
                    <option value="">Select Insurance Type</option>
                    @foreach(config('constants.insurance_types') as $key=>$value)
                    <option value={{$key}} @if($key==$quotation->insurance_type){{"selected"}}@endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="car_value">Car Value</label>
                <input type="number" class="form-control" value="{{(old('car_value')? old('car_value'): $quotation->car_value )}}" name="car_value" id="car_value" required>
                @if ($errors->has('car_value'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('car_value') }}</span>
                @endif
            </div>
            <hr>
            <div class="form-group">
                <label for="personal_accident_benefits_for_driver" class="d-block">Personal Accident Benefits For Driver</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_driver" {{($quotation->personal_accident_benefits_for_driver==1)?"checked":""}} value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_driver" {{($quotation->personal_accident_benefits_for_driver==0)?"checked":""}} value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="personal_accident_benefits_for_passenger" class="d-block">Personal Accident Benefits For Passenger</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_passenger" {{($quotation->personal_accident_benefits_for_passenger==1)?"checked":""}} value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="personal_accident_benefits_for_passenger" {{($quotation->personal_accident_benefits_for_passenger==0)?"checked":""}} value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="road_side_assistance_services" class="d-block">Road Side Assistance Services</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="road_side_assistance_services" {{($quotation->road_side_assistance_services==1)?"checked":""}} value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="road_side_assistance_services" {{($quotation->road_side_assistance_services==0)?"checked":""}} value=0 required>No
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="rent_a_car" class="d-block">Rent A Car</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="rent_a_car" {{($quotation->rent_a_car==1)?"checked":""}} value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="rent_a_car" {{($quotation->rent_a_car==0)?"checked":""}} value=0 required>No
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
            @foreach($quotation->extraInformationInputsAsArray as $key=>$value)
            @php $counter++; @endphp
            <div class="form-group" id="question-php-{{$counter}}">
                <label for="{{$key}}" class="d-block">{{$key}} <button type="button" id="delete-question" class="btn btn-danger btn-circle" data-id="question-php-{{$counter}}"><i class="fa fa-times"></i></button></label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input extra-question" id="question-php-{{$counter}}" name="{{$key}}" {{($value==1)?"checked":""}} value=1 required> Yes
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" id="question-php-{{$counter}}" name="{{$key}}" {{($value==0)?"checked":""}} value=0 required> No
                    </label>
                </div>
            </div>
            @endforeach
            <div class="questions-area"></div>
            <hr>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" value="{{(old('price')? old('price'): $quotation->price )}}" name="price" id="price" required>
                @if ($errors->has('price'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="">Vat</label>
                <input type="number" class="form-control" value="{{(old('vat')? old('vat'): $quotation->vat )}}" name="vat" id="vat" required>
                @if ($errors->has('vat'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('vat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Total</label>
                <input type="number" class="form-control" value="{{(old('total')? old('total'): $quotation->total )}}" name="total" id="total" required>
                @if ($errors->has('total'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('total') }}</span>
                @endif
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/quotation.js")}}></script>
@endsection