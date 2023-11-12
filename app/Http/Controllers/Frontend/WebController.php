<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }

    public function single()
    {
        return view('layouts.singlePost');
    }
}
