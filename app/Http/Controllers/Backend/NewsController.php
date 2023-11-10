<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use DB;

class NewsController extends Controller
{
    // Show All News -----------
    public function index()
    {
        $news = DB::table('news')->get();
        $category = DB::table('category')->get();
        $division = DB::table('divisions')->get();

        return view ('backend.news.newsAdd', compact('news', 'category', 'division'));
    }

    // Store News -----------
    public function getSubCat($cat_id)
    {
        return $cat_id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
