<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Carbon;

class GalleryController extends Controller
{

    //Methods for Photos Gallery
    public function Addphotos(){
        return view('admin.gallery.add_photo');
    }

    public function Storephotos(Request $request){

        $images = $request->file('photos');

        foreach($images as $photo){

        $name_gen = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
        $photo->move('uploads/gallery/photos/',$name_gen);
        $save_url = 'uploads/gallery/photos/'.$name_gen;

        Gallery::insert([
            'photo' => $save_url,
            'type' => 'photo',
            'created_at' => Carbon::now(),

        ]);
        }

        $notification = array(
            'message' => 'Photo Gallery Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.photos')->with($notification);

    }

    public function Allphotos(){
        $photos = Gallery::where('type','photo')->latest()->get();
        return view('admin.gallery.all_photos',compact('photos'));
    }


    public function Editphoto($id){

        $photo = Gallery::findOrFail($id);
        return view('admin.gallery.edit_photo',compact('photo'));

    }


    public function Updatephoto(Request $request){
        $photo_id = $request->id;

        if ($request->file('photo')) {

    $image = $request->file('photo');
    unlink(Gallery::findOrFail($photo_id)->photo);
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $image->move('uploads/gallery/photos/',$name_gen);

    $save_url = 'uploads/gallery/photos/'.$name_gen;

        Gallery::findOrFail($photo_id)->update([
            'photo' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Photo Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.photos')->with($notification);

        }

    }

    public function Deletephoto($id){

        $photo = Gallery::findOrFail($id);
        $img = $photo->photo;
        if($photo->type=='photo'){
        unlink($img);
        }

        Gallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Photo Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }


    //Methods for Videos Gallery

    public function Addvideo(){
        return view('admin.gallery.add_video');
    }

    public function Storevideo(Request $request){

        $thumbnail = $request->file('thumbnail');

        $name_gen = hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
        $thumbnail->move('uploads/gallery/thumbnails/',$name_gen);
        $save_url = 'uploads/gallery/thumbnails/'.$name_gen;

        Gallery::insert([
            'photo' => $save_url,
            'title'=> $request->title,
            'video' => $request->video,
            'type' => 'video',
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Video Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.videos')->with($notification);

    }

    public function Allvideos(){
        $videos = Gallery::where('type','video')->latest()->get();
        return view('admin.gallery.all_videos',compact('videos'));
    }


    public function Editvideo($id){

        $video = Gallery::findOrFail($id);
        return view('admin.gallery.edit_video',compact('video'));

    }

    public function Updatevideo(Request $request){
        $video_id = $request->id;
        $video = Gallery::findOrFail($video_id);

        if ($request->file('thumbnail')) {
            unlink($video->photo);
            $name_gen = hexdec(uniqid()).'.'.$request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move('uploads/gallery/thumbnails/',$name_gen);
            $save_url = 'uploads/gallery/thumbnails/'.$name_gen;
            $video->update([
                'photo' => $save_url,
            ]);
        }

        $video->update([
            'title'=> $request->title,
            'video' => $request->video,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.videos')->with($notification);
    }

    public function Deletevideo($id){

        $video = Gallery::findOrFail($id);
        $img = $video->photo;
        if($video->type=='video'){
        unlink($img);
        }

        Gallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Video Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }




}
