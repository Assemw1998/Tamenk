@extends('admins_side.common.layouts.dashboard')
@section('content')
<link href={{asset("custom/super_admin/css/model.css")}} rel="stylesheet" >
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$carModel->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.car-model-index')}}">Car Models</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.car-model-update',['id' => $carModel->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="make_id">Car Make Name</label>
                <select class="form-control" name="make_id" id="make_id" required>
                    <option value="">Select Car Make</option>
                    @foreach($carMakes as $carMake)
                        @if(old("make_id"))
                            <option value="{{$carMake->id}}" {{ (old("make_id") == $carMake->id ? "selected":"") }}>{{$carMake->name}}</option>
                        @else
                            <option value="{{$carMake->id}}" {{ ( $carModel->make_id == $carMake->id ? "selected":"") }}>{{$carMake->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Model Name</label>
                <input type="text" class="form-control" value="{{(old('name')? old('name'): $carModel->name )}}" name="name" id="name" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/carModel.js")}}></script>
@endsection