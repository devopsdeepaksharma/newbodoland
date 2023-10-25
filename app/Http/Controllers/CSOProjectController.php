<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CSOProjectController extends Controller
{
    public function index(Request $request)
    {
        
        return view('cso.projectlist');
    }


    public function createprojectdetail(Request $request)
    {
        return view('cso.createprojectdetail');
    }


    public function storeprojectdetail(Request $request)
    {
        return "hello";
    }

    public function approvedprojectdetail(Request $request)
    {
        return view('cso.approvedproject');
    }

    
}
