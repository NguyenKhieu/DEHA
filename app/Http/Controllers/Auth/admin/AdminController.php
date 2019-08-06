<?php

namespace App\Http\Controllers\Auth\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index()
    {
        return view('admincp.layout.index');
    }
}