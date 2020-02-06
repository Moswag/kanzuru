<?php

namespace App\Http\Controllers\Council;

use App\Compalaints;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function viewReport(){
        $all=Compalaints::all()->count();
        $resolved=Compalaints::where('status','resolved')->count();
        $pending=Compalaints::where('status','pending')->count();
        return view('admin.report.report',compact('all','resolved','pending'));
    }
}
