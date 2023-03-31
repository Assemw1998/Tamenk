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
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                   <a href="{{ route('super-admin.dashboard.city-index')}}">Cities</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.city-create')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="brand_id">Country Name</label>
                <select class="form-control" name="country_id" id="country_id" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $county)
                        <option value="{{$county->id}}" {{ (old("country_id") == $county->id ? "selected":"") }}>{{$county->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">City Name</label>
                <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" required>
                @if ($errors->has('name'))
                    <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Submit</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/city.js")}}></script>
@endsection