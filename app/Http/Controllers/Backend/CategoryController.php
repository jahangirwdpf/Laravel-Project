<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $category['category']=DB::table('category')->get();
        return view ('backend.categories.categoryAdd', compact('category'));
    }

    public function addcat(Request $request)
    {
        $validated = $request->validate([
            'n_cat_name' => 'required|unique:category|max:55',
            ]);
            $data = array();
            $data['n_cat_name']=$request->n_cat_name;
            DB::table('category')->insert($data);

        return redirect()->back();
    }

    public function add(){
        return view('backend.categories.categoryAdd');
    }
}
