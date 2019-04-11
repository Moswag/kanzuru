<?php

namespace App\Http\Controllers;

use App\Compalaints;
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
