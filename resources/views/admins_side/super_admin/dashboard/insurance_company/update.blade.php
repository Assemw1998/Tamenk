@extends('admins_side.common.layouts.dashboard')
@section('content')
<link rel="stylesheet" href={{ asset("custom/admins_side/super_admin/css/insuranceCompany.css") }} />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }} #{{$insuranceCompany->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('super-admin.dashboard.insurance-company-index')}}">Insurance Companies</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section action="" class="mt-3 content text-dark center p-3">
        <form action="{{ route('super-admin.dashboard.insurance-company-update',['id' => $insuranceCompany->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Insurance Company Name</label>
                <input type="text" class="form-control" value="{{(old('name')? old('name'): $insuranceCompany->name )}}" name="name" id="name" required>
            </div>
            <label>Choose Company Logo</label>
            @if(!isset($insuranceCompany->companyLogo->id))
            <div class="form-group">

                <input type="file" class="form-control" id="company_logo" name="company_logo" onchange="preview_image('company_logo','#company_logo_preview');" required>
            </div>
            <div id="company_logo_preview" class="mb-3"></div>
            @else
            <div id="company_logo_preview" class="mb-3">

                <div class="image-area">
                    <button type="button" data-id={{$insuranceCompany->companyLogo->id}} class="close AClass rounded-lg image-delete-button">
                        <span>&times;</span>
                    </button>
                    <img width='200' height='150' class='rounded p-2' src="{{ asset($insuranceCompany->companyLogo->logo_url) }}">
                </div>
            </div>
            @endif
            <hr>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/super_admin/js/insuranceCompany.js")}}></script>
@endsection