@extends('super_admin.layouts.dashboard')
@section('content')
<link href={{asset("custom/super_admin/css/model.css")}} rel="stylesheet" >
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$model->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.model-index')}}">Model</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.model-update',['id'=>$model->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Model Name</label>
                <input type="text" class="form-control" value="{{(old('name')? old('name'): $model->name )}}" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="brand_id">Brand Name</label>
                <select class="form-control" name="brand_id" id="brand_id" required>
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        @if(old("brand_id"))
                            <option value="{{$brand->id}}" {{ (old("brand_id") == $brand->id ? "selected":"") }}>{{$brand->name}}</option>
                        @else
                            <option value="{{$brand->id}}" {{ ( $model->brand_id == $brand->id ? "selected":"") }}>{{$brand->name}}</option>
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
<script type="text/javascript" src={{asset("custom/super_admin/js/model.js")}}></script>
@endsection