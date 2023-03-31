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
    <section action="" class="mt-3 content text-dark center p-3">
    <form action="
        @if(auth()->user() instanceof \app\models\SuperAdmin)
            {{route("super-admin.dashboard.customer-update",['id' => $customer->id])}}
        @else
            {{route("admin.dashboard.customer-update",['id' => $customer->id])}}
        @endif
        " method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" value="{{(old('full_name')? old('full_name'): $customer->full_name )}}" name="full_name" id="full_name" required>
                @if ($errors->has('full_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('full_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" value="{{(old('phone_number')? old('phone_number'): $customer->phone_number )}}" name="phone_number" id="phone_number" required>
                @if ($errors->has('phone_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{(old('email')? old('email'): $customer->email )}}" name="email" id="email" required>
                @if ($errors->has('email'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="country_id">Country</label>
                <select class="form-control" name="country_id" id="country_id" data-url="
                @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/get-cities/"}}
                @else
                {{"/admin/dashboard/get-cities/"}}
                @endif
                " required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        @if(old("country_id"))
                            <option value="{{$country->id}}" {{ (old("country_id") == $country->id ? "selected":"") }}>{{$country->name}}</option>
                        @else
                            <option value="{{$country->id}}" {{ ( $customer->country_id == $country->id ? "selected":"") }}>{{$country->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="city_id">City</label>
                <select class="form-control" name="city_id" id="city_id" required>
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        @if(old("city_id"))
                            <option value="{{$city->id}}" {{ (old("city_id") == $city->id ? "selected":"") }}>{{$city->name}}</option>
                        @else
                            <option value="{{$city->id}}" {{ ( $customer->city_id == $city->id ? "selected":"") }}>{{$city->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="car_make_id">Car Make</label>
                <select class="form-control" name="car_make_id" id="car_make_id" data-url="
                @if(auth()->user() instanceof \app\models\SuperAdmin)
                {{"/super-admin/dashboard/get-car-models/"}}
                @else
                {{"/admin/dashboard/get-car-models/"}}
                @endif
                " required>
                    <option value="">Select Car Make</option>
                    @foreach($carMakes as $carMake)
                        @if(old("car_make_id"))
                            <option value="{{$carMake->id}}" {{ (old("car_make_id") == $carMake->id ? "selected":"") }}>{{$carMake->name}}</option>
                        @else
                            <option value="{{$carMake->id}}" {{ ( $customer->car_make_id == $carMake->id ? "selected":"") }}>{{$carMake->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="car_model_id">Car Model</label>
                <select class="form-control" name="car_model_id" id="car_model_id" required>
                    <option value="">Select Car Model</option>
                    @foreach($carModels as $carModel)
                        @if(old("car_model_id"))
                            <option value="{{$carModel->id}}" {{ (old("car_model_id") == $carModel->id ? "selected":"") }}>{{$carModel->name}}</option>
                        @else
                            <option value="{{$carModel->id}}" {{ ( $customer->car_model_id == $carModel->id ? "selected":"") }}>{{$carModel->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="year">Car Year</label>
                <input type="text" class="form-control" value="{{(old('year')? old('year'): $customer->year )}}" name="year" id="year" required>
                @if ($errors->has('year'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('year') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="color_id">Car Color</label>
                <select class="form-control" name="color_id" id="color_id" required>
                    <option value="">Select Color</option>
                    @foreach($colors as $color)
                        @if(old("color_id"))
                            <option value="{{$color->id}}" {{ (old("color_id") == $color->id ? "selected":"") }}>{{$color->name}}</option>
                        @else
                            <option value="{{$color->id}}" {{ ( $customer->color_id == $color->id ? "selected":"") }}>{{$color->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/common/js/customer.js")}}></script>
@endsection