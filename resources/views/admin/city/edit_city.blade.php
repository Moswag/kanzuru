@extends('layouts.master')
@section('pageHeader')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">City</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit City</li>
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
                    <h4 class="m-b-0 text-white">Edit City</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('update_city')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-body">
                            <h3 class="box-title">City Info</h3>
                            <input type="hidden" value="{{$city->id}}" name="id">
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">City</label>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$city->name}}" class="form-control" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!--/span-->
                            </div>

                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{route('view_cities')}}" type="button" class="btn btn-inverse">Cancel</a>
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
