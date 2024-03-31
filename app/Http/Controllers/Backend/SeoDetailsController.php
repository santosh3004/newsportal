<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoDetails;
use Illuminate\Http\Request;

class SeoDetailsController extends Controller
{
    public function SeoDetails(){

        $seo = SeoDetails::find(1);
        return view('admin.seo.seo_details',compact('seo'));

    }

    public function UpdateSeo(Request $request){

        $request->validate([
            'meta_title' => 'required',
            'meta_author' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        $seo = SeoDetails::find(1);
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_keyword = $request->meta_keyword;
        $seo->meta_description = $request->meta_description;
        $seo->updated_at = now();
        $seo->update();

        $notification = array(
            'message' => 'SEO Details Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



}
