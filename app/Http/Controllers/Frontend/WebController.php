<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    public function index()
    {
            $category = DB::table('category')->get();
            $newses = DB::table('news')
            ->join('category', 'news.cat_id','=','category.cat_id')
            ->join('sub_category', 'news.subcat_id','=','sub_category.subcat_id')
            ->select('news.*','category.cat_name_en','category.cat_name_bn','sub_category.subcat_name_en')
            ->where('status',1)
            ->get()->sortDesc();
            $bnews=DB::table('news')->where('breaking_news',1)->get()->sortDesc(); 
            $bigThumbnail=DB::table('news')->where('big_thumbnail',1)->get()->sortDesc(); 
            $firstThumbnail=DB::table('news')->where('first_section_thumbnail',1)->get()->sortDesc(); 
            $firstSection=DB::table('news')->where('first_section',1)->get()->sortDesc();
        
            // return dd($newses);
        return view('layouts.index', compact('newses', 'bigThumbnail', 'firstThumbnail', 'category', 'firstSection', 'bnews'));
    }

    public function single()
    {
        return view('layouts.singlePost');
    }
}
