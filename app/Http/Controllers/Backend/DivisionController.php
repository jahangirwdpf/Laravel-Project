<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DivisionModel;
use DB;

class DivisionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // All Divison Show -------
    public function index()
    {
        $division=DB::table('divisions')->get()->sortDesc();
        return view ('backend.division.divisionAdd', compact('division'));
    }

    // Add division ---------
    public function storeDiv(Request $request)
    {
        $validated = $request->validate([
            'div_name_en' => 'required|unique:divisions|max:55',
            'div_name_bn' => 'required|unique:divisions|max:55',
            ]);
            $data = array();
            $data['div_id']=$request->div_id;
            $data['div_name_en']=$request->div_name_en;
            $data['div_name_bn']=$request->div_name_bn;
            DB::table('divisions')->insert($data);
            
            $notice = array(
                'messege'=> 'Successfully Added',
                'alert-type'=> 'success'
            );
        return redirect()->back()->with('$notice');
    }

    // Edit division ---------
    public function editDiv($id)
    {
        $division=DB::table('divisions')->where('div_id', $id)->first();
        $notice = array(
            'messege'=> 'Successfully Edited',
            'alert-type'=> 'success'
        );
        return view ('backend.division.divisionEdit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateDiv(Request $request, $id)
    {
        $validated = $request->validate([
            'div_name_en' => 'required|unique:divisions|max:55',
            'div_name_bn' => 'required|unique:divisions|max:55',
            ]);
            $data = array();
            $data['div_id']=$request->div_id;
            $data['div_name_en']=$request->div_name_en;
            $data['div_name_bn']=$request->div_name_bn;
            DB::table('divisions')->where('div_id', $id)->update($data);
            $notice = array(
                'messege'=> 'Successfully Updated',
                'alert-type'=> 'success'
            );
            return redirect('division')->with('notice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('divisions')->where('div_id', $id)->delete();
        $notice = array(
            'messege'=> 'Successfully Deleted',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with('$notice');
    }
}
