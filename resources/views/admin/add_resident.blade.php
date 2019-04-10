@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add Resident</h4>
                </div>
                <div class="card-body">
                    <form action="#" class="form-horizontal">
                        <div class="form-body">
                            <h3 class="box-title">Person Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Full Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="John doe">
                                            <small class="form-control-feedback"> This is inline help </small> </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger row">
                                        <label class="control-label text-right col-md-3">House Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" placeholder="12n">
                                            <small class="form-control-feedback"> This field has error. </small> </div>
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
                                            <select class="form-control custom-select">
                                                <option value="">Male</option>
                                                <option value="">Female</option>
                                            </select>
                                            <small class="form-control-feedback"> Select gender. </small> </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">National ID</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="national ID">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Location</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" data-placeholder="Choose a  Location" tabindex="1">
                                                <option value="Category 1">Warren Park</option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 5</option>
                                                <option value="Category 4">Category 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger row">
                                        <label class="control-label text-right col-md-3">Phone Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-danger" placeholder="2637xx-xxx-xxx">
                                            <small class="form-control-feedback"> This field has error. </small> </div>
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
                                            <button type="button" class="btn btn-inverse">Cancel</button>
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