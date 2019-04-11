@extends('layouts.master')
@section('pageHeader')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Residents</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Resident</li>
            </ol>
        </div>

        @if(Session::has('message'))
            <div class="alert-success">{{Session::get('message')}}</div>
        @elseif(Session::has('error'))
            <div class="alert-danger">{{Session::get('error')}}</div>
        @endif
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Resident</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('update_resident')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden"  value="{{$resident->id}}" name="id">
                        <div class="form-body">
                            <h3 class="box-title">Person Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Full Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Full name" value="{{$resident->name}}" name="name">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">National ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="National ID" value="{{$resident->national_id}}" name="national_id">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phonenumber</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="phonenumber" value="{{$resident->phonenumber}}" name="phonenumber">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">

                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">House Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="House Number" name="house_number" value="{{$resident->house_number}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Location</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="location">
                                                <option value="{{$resident->location}}">{{$resident->location}}</option>
                                                @foreach($locations as $location)
                                                    @if($resident->location==$location->name)
                                                        @else
                                                    <option value="{{$location->name}}">{{$location->name}}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->


                            <!--/row-->

                            <!--/row-->
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{route('view_residents')}}" type="button" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop