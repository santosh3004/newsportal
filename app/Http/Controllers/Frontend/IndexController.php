<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsPost;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use Illuminate\Support\Facades\App;


class IndexController extends Controller
{
    public function Index()
    {
        $latestnews = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $popularnews = NewsPost::orderBy('view_count', 'DESC')->limit(8)->get();

        return view('frontend.home', compact('latestnews', 'popularnews'));
    }

    public function NewsDetails($id, $slug)
    {

        $news = NewsPost::findOrFail($id);
        $tags = $news->tags;
        $tags_all = explode(',', $tags);
        $cat_id = $news->category_id;
        $relatednews = NewsPost::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(6)->get();
        $latestnews = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $popularnews = NewsPost::orderBy('view_count', 'DESC')->limit(8)->get();

        $newsKey = 'blog' . $news->id;
        if (!Session::has($newsKey)) {
            $news->increment('view_count');
            Session::put($newsKey, 1);
        }
        return view('frontend.news.news_details', compact('news', 'tags_all', 'relatednews', 'latestnews', 'popularnews'));
    }

    public function CategoryNews($type, $id, $slug)
    {
        if ($type === 'category') {
            $category = 'category_id';
        } else {
            $category = 'subcategory_id';
        }

        $allcategorynews = NewsPost::where('status', 1)->where($category, $id)->orderBy('id', 'DESC')->get();
        $latesttwonews = NewsPost::where('status', 1)->where($category, $id)->orderBy('id', 'DESC')->limit(2)->get();
        $latestnews = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        $popularnews = NewsPost::orderBy('view_count', 'DESC')->limit(8)->get();

        if (count($allcategorynews)==0){
            return redirect()->route('home');
        } else {
            return view('frontend.news.category_news', compact('allcategorynews', 'latesttwonews', 'latestnews', 'popularnews'));
        }
    }
    public function Change(Request $request){


        //App::setLocale($request->lang);

        session()->put('locale',$request->lang);

        return redirect()->back();

    }
}
