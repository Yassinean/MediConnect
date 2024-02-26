<?php

namespace App\Http\Controllers;

use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewRatingController extends Controller
{
    public function reviewstore(Request $request)
    {
        $review = new ReviewRating();
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->medecin_id = $request->doctor_id; ;
        $review->save();
        return redirect()->back();
    }
}
