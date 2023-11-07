<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\xz;
use DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
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
            
            $notice = array(
                'messege'=> 'Successfully Added',
                'alert-type'=> 'success'
            );
        return redirect()->back()->with('$notice');
    }

    public function add(){
        $category=DB::table('category')->get()->sortDesc();
        return view ('backend.categories.categoryAdd', compact('category'));
    }

    public function catDelete($id){
        DB::table('category')->where('cat_id', $id)->delete();
        $notice = array(
            'messege'=> 'Successfully Added',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with('$notice');
    }

    public function editCat($id){
        $category=DB::table('category')->where('cat_id', $id)->first();
        $notice = array(
            'messege'=> 'Successfully Added',
            'alert-type'=> 'success'
        );
        return view ('backend.categories.categoryEdit', compact('category'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'cat_name_en' => 'required|max:55',
            'cat_name_bn' => 'required|max:55',
            ]);
            $data = array();
            $data['cat_id']=$request->cat_id;
            $data['cat_name_en']=$request->cat_name_en;
            $data['cat_name_bn']=$request->cat_name_bn;
            DB::table('category')->where('cat_id', $id)->update($data);
            $notice = array(
                'messege'=> 'Successfully Updated',
                'alert-type'=> 'success'
            );
            return redirect('category')->with('notice');
    }
}
