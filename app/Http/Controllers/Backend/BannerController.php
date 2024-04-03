<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function AllBanners()
    {
        $banner = Banner::findOrFail(1);
        return view('admin.banner.banners', compact('banner'));
    }

    public function UpdateBanners(Request $request)
    {

        $banner_id = $request->id;

        if ($request->file('home_one')) {

            unlink(Banner::findOrFail($banner_id)->home_one);
            $image1 = $request->file('home_one');
            $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('uploads/banners/'), $name_gen1);
            $save_url1 = 'uploads/banners/' . $name_gen1;

            Banner::findOrFail($banner_id)->update([
                'home_one' => $save_url1,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }


        if ($request->file('home_two')) {
            unlink(Banner::findOrFail($banner_id)->home_two);
            $image2 = $request->file('home_two');
            $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('uploads/banners/'), $name_gen2);
            $save_url2 = 'uploads/banners/' . $name_gen2;

            Banner::findOrFail($banner_id)->update([
                'home_two' => $save_url2,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }

        if ($request->file('home_three')) {
            unlink(Banner::findOrFail($banner_id)->home_three);
            $image3 = $request->file('home_three');
            $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('uploads/banners/'), $name_gen3);
            $save_url3 = 'uploads/banners/' . $name_gen3;

            Banner::findOrFail($banner_id)->update([
                'home_three' => $save_url3,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }

        if ($request->file('home_four')) {
            unlink(Banner::findOrFail($banner_id)->home_four);
            $image4 = $request->file('home_four');
            $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('uploads/banners/'), $name_gen4);
            $save_url4 = 'uploads/banners/' . $name_gen4;

            Banner::findOrFail($banner_id)->update([
                'home_four' => $save_url4,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }


        if ($request->file('news_category_one')) {
unlink(Banner::findOrFail($banner_id)->news_category_one);
            $image5 = $request->file('news_category_one');
            $name_gen5 = hexdec(uniqid()) . '.' . $image5->getClientOriginalExtension();
            $image5->move(public_path('uploads/banners/'), $name_gen5);
            $save_url5 = 'uploads/banners/' . $name_gen5;

            Banner::findOrFail($banner_id)->update([
                'news_category_one' => $save_url5,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }


        if ($request->file('news_details_one')) {

            $image6 = $request->file('news_details_one');
            $name_gen6 = hexdec(uniqid()) . '.' . $image6->getClientOriginalExtension();
            $image6->move(public_path('uploads/banners/'), $name_gen6);
            $save_url6 = 'uploads/banners/' . $name_gen6;

            Banner::findOrFail($banner_id)->update([
                'news_details_one' => $save_url6,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);
        }
    }
}
