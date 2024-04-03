<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SiteSettings()
    {
        $siteinfo=SiteSetting::findOrFail(1);
        return view('admin.sitesetting.sitesetting', compact('siteinfo'));
    }

    public function UpdateSiteSettings(Request $request){
        $siteinfo=SiteSetting::findOrFail(1);
        $siteinfo->site_title=$request->site_title;
        $siteinfo->address=$request->address;
        $siteinfo->email=$request->email;
        $siteinfo->contact=$request->contact;
        $siteinfo->facebook=$request->facebook;
        $siteinfo->twitter=$request->twitter;
        $siteinfo->youtube=$request->youtube;
        $siteinfo->instagram=$request->instagram;
        if($request->file('logo')){
            $file=$request->file('logo');
            if($siteinfo->logo && file_exists(public_path('uploads/logo/'.$siteinfo->logo))){
            unlink(public_path('uploads/logo/'.$siteinfo->logo));
            }
            $filename=Hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/logo/'),$filename);
            $siteinfo->logo='uploads/logo/'.$filename;
        }
        $siteinfo->update();
        return back()->with('success', 'Site Settings Updated Successfully!');
    }

}
