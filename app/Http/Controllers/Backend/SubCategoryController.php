<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use DB;

class SubCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $data['category'] = CategoryModel::get();
        return view ('backend.categories.subCategory', compact(['category' => $data]));
    }

    public function category(){
        $data['category'] = CategoryModel::orderBy('cat_id', 'DESC')::get();
    }

    // public function create(){
    //     $category = DB::table('category')->get();
    //     return view ('backend.categories.subCategory', compact('subCategory'));
    // }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'subcat_name_en' => 'required|unique:sub_category|max:55',
            'subcat_name_bn' => 'required|unique:sub_category|max:55',
            ]);
            $data = array();
            $data['subcat_id']=$request->subcat_id;
            $data['cat_id']=$request->cat_id;
            $data['subcat_name_en']=$request->subcat_name_en;
            $data['subcat_name_bn']=$request->subcat_name_bn;

            DB::table('sub_category')->insert($data);
            
            $notice = array(
                'messege'=> 'Successfully Added',
                'alert-type'=> 'success'
            );
        return redirect()->back()->with('$notice');
    }

    public function addSubcat(){
        $subCategory=DB::table('sub_category')->get()->sortDesc();
        return view ('backend.categories.subCategory', compact('subCategory'));
    }
}
