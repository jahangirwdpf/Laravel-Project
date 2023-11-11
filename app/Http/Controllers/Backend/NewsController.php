<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        $category = DB::table('category')->get();
        $image_news = DB::table('news')->get();

        return view ('backend.news.newsAdd', compact('news', 'category', 'image_news'));
    }

    // Json Data -----------
    public function getSubCat($cat_id)
    {
        return $cat_id;
    }

    // Store News -----------
    public function storeNews(Request $request)
    {
        $validated = $request->validate([
            'cat_id' => 'required',
            ]);
            $data = array();
            $data['news_title_en']=$request->news_title_en;
            $data['news_title_bn']=$request->news_title_bn;
            $data['cat_id']=$request->cat_id;
            $data['subcat_id']=$request->subcat_id;
            $data['news_details_en']=$request->news_details_en;
            $data['news_details_bn']=$request->news_details_bn;
            $data['news_tags_en']=$request->news_tags_en;
            $data['news_tags_bn']=$request->news_tags_bn;
            $data['breaking_news']=$request->breaking_news;
            $data['first_section']=$request->first_section;
            $data['first_section_thumbnail']=$request->first_section_thumbnail;
            $data['big_thumbnail']=$request->big_thumbnail;
            $data['post_date']=date('d-m-Y');

            $image=$request->img;
            $image_news=time().'.'.$image->getClientOriginalExtension();
            $request->img->move('img', $image_news);
            $data['img']=$image_news;

            DB::table('news')->insert($data, $image);
            return redirect()->back()->with('message', 'Successfully News Inserted');

            // $image=$request->img;
            // if('$image'){
            //     $image_news=uniqueid().'.'.$image->getClientOriginalExtension();
            //     Image::make($image_news)->resize(500,350)->save('public/newsImages/'.$image_news);
            //     $data['img']='public/newsImages/'.$image_news;

            //     DB::table('news')->insert($data);
            //     return redirect()->back();
            // }else{
            //     return redirect()->back();
            // }
    }

    // Show News -----------------------------
    public function showNews()
    {
        $newses = DB::table('news')
        ->join('category', 'news.cat_id','category.cat_id')
        ->join('sub_category', 'news.subcat_id','sub_category.subcat_id')
        ->select('category.cat_name_en','category.cat_name_bn','sub_category.subcat_name_en','sub_category.subcat_name_bn','news.*')
        ->get();

        return view ('backend.news.newsView', compact('newses'));

        // $subCategory = DB::table('sub_category')->join('category', 'sub_category.cat_id','category.cat_id')->select('category.cat_name_en','category.cat_name_bn','sub_category.*')->get()->sortDesc();
        // $category = DB::table('category')->get();
  
    }

    // Edit News -------------------------
    public function edit(string $id)
    {
        //
    }

    // Update News -------------------------
    public function update(Request $request, string $id)
    {
        //
    }

    // Remove News -------------------------
    public function destroy(string $id)
    {
        //
    }
}
