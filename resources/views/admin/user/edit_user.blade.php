@extends('layouts.master')

@section('pageHeader')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">User</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Council  User</li>
            </ol>
        </div>
    </div>
@stop


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit User</h4>
                </div>
                @if(Session::has('message'))
                    <div class="alert-success">{{Session::get('message')}}</div>
                @elseif(Session::has('error'))
                    <div class="alert-danger">{{Session::get('error')}}</div>
                @endif
                <div class="card-body">
                    <form action="{{route('update_user')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-body">
                            <input type="hidden" value="{{$user->id}}" name="id" />
                            <h3 class="box-title">User Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Council</label>
                                        <div class="col-md-10">
                                            <select type="text" class="form-control" placeholder="Chose council" name="council">
                                                @foreach($councils as $council)
                                                    <option value="{{$council->id}}">{{$council->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$user->name}}" class="form-control" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Surname</label>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$user->surname}}" class="form-control" placeholder="Surname" name="surname">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Employee ID</label>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$user->employee_id}}" class="form-control" placeholder="Employee ID" name="employee_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phonenumber</label>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$user->phonenumber}}" class="form-control" placeholder="Phonenumber" name="phonenumber">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->


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
                                            <a href="{{route('view_users')}}" type="button" class="btn btn-inverse">Cancel</a>
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
