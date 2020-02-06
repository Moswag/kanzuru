@extends('layouts.master')
@section('cssContent')
    <script>
        window.onload = function () {

            var options = {

                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 40,
                    toolTipContent: "<b>{label}</b>: {y}%",
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabelFontSize: 16,
                    indexLabel: "{label}",
                    dataPoints: [
                        { y: {{$resolved}}, label: "Resolved Complaints" },
                        { y: {{$pending}}, label: "Pending Complaints" }
                    ]
                }]
            };
            $("#chartContainer").CanvasJSChart(options);

        }
    </script>
@stop
@section('pageHeader')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Report</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">View Report</li>
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
                    <h4 class="m-b-0 text-white">View Report</h4>
                </div>
                <div class="card-body">
                    <br><br><br><br>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('jsContent')

    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
@stop