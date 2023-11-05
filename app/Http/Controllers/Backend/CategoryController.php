<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
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
            'cat_name_en' => 'required|unique:category|max:55',
            'cat_name_bn' => 'required|unique:category|max:55',
            ]);
            $data = array();
            $data['cat_id']=$request->cat_id;
            $data['cat_name_en']=$request->cat_name_en;
            $data['cat_name_bn']=$request->cat_name_bn;
            DB::table('category')->insert($data);

        return redirect()->back();
    }

    public function add(){
        $category=DB::table('category')->get();
        return view ('backend.categories.categoryAdd', compact('category'));
    }
}
