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

    // Store Sub-Category -----------
    public function index(Request $request)
    {
        $validated = $request->validate([
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

    // Show Sub-Category -----------
    public function addSubcat(){
        $subCategory=DB::table('sub_category')->join('category', 'sub_category.cat_id','category.cat_id')->select('category.cat_name_en','category.cat_name_bn','sub_category.*')->get()->sortDesc();
        $category=DB::table('category')->get();
        return view ('backend.categories.subCategory', compact('subCategory', 'category'));
    }

    // Remove Sub-Category -----------
    public function subcatDelete($id){
        DB::table('sub_category')->where('subcat_id', $id)->delete();
        $notice = array(
            'messege'=> 'Successfully Deleted',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with('$notice');
    }

    // Edit Sub-Category -----------
    public function editSubCat($id){
        $subCategory=DB::table('sub_category')->where('subcat_id', $id)->first();
        $notice = array(
            'messege'=> 'Successfully Edited',
            'alert-type'=> 'success'
        );
        return view ('backend.categories.subCategoryEdit', compact('subCategory'));
    }

    // Update Sub-Category -----------
    public function updateSub(Request $request, $id){
        $validated = $request->validate([
            'subcat_name_en' => 'required|max:55',
            'subcat_name_bn' => 'required|max:55',
            ]);
            $data = array();
            $data['subcat_id']=$request->subcat_id;
            $data['cat_id']=$request->cat_id;
            $data['subcat_name_en']=$request->subcat_name_en;
            $data['subcat_name_bn']=$request->subcat_name_bn;
            DB::table('sub_category')->where('subcat_id', $id)->update($data);
            $notice = array(
                'messege'=> 'Successfully Updated',
                'alert-type'=> 'success'
            );
            return redirect('subCategory')->with('notice');
    }
}
