@extends('super_admin.layouts.dashboard')
@section('content')
<link href={{asset("custom/super_admin/css/color.css")}} rel="stylesheet" >
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$color->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.color-index')}}">Color</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.color-update',['id'=>$color->id])}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Color Name</label>
                <input type="text" class="form-control" value="{{(old('name')? old('name'): $color->name )}}" name="name" id="name" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/super_admin/js/color.js")}}></script>
@endsection