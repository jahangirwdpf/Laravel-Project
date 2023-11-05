<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.reporterAdd');
    }

    public function view()
    {
        return view('backend.reporterView');
    }
    
    public function newsAdd()
    {
        return view('backend.newsAdd');
    }

    public function newsview()
    {
        return view('backend.newsView');
    }
}
