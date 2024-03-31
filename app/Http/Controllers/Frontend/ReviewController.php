<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){

        $news = $request->news_id;
        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([

            'news_id' => $news,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        return back()->with("status","Review Will Approve By Admin");
    }

    public function AllReviews(){

        $reviews = Review::latest()->get();
        return view('admin.review.all_reviews',compact('reviews'));

    }

    public function PendingReviews(){

        $reviews = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('admin.review.pending_reviews',compact('reviews'));

    }

    public function ApproveReview($id){

        Review::where('id',$id)->update(['status' => 1]);
         $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.reviews')->with($notification);
    }

    public function RejectReview($id){

        Review::where('id',$id)->update(['status' => 0]);
         $notification = array(
            'message' => 'Review Declined Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteReview($id){
        Review::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


}
