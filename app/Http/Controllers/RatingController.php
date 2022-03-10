<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use App\Models\Rating;
use App\Models\Produkumkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function ulasan(){
        $umkm = Umkm::where('user_id', Auth::id())->get();
        if($umkm->count()){
            foreach($umkm as $item);
        $ratings = Rating::where('umkm_id', $item->id)->get();
        $rating_sum = Rating::where('umkm_id', $item->id)->sum('stars_rated');
        $user_rating = Rating::where('umkm_id', $item->id)->where('user_id', Auth::id())->first();

        if ($ratings->count() > 0) {
            $rating_value = $rating_sum / $ratings->count();
        } else {
            $rating_value = 0;
        }
         $data=([
            'ratings' => $ratings,
            'rating_value' => $rating_value,
            'user_rating' => $user_rating,
         ]);
        }
        return view('ulasan', [
            'title' => 'Ulasan',
            'umkm' => $umkm,
            
            
        ]);
        
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'product_rating' => 'required',
            'review' => 'required',
        ]);

        $stars_rated = $request->input('product_rating');
        $review = $request->input('review');
        $umkm_id = $request->input('umkm_id');
        $umkm_check = Umkm::where('id', $umkm_id)->first();

        if ($umkm_check) {
            $existing_rating = Rating::where('user_id', Auth::id())->where('umkm_id', $umkm_id)->first();
            if ($existing_rating) {
                $existing_rating->stars_rated = $stars_rated;
                $existing_rating->review = $review;
                $existing_rating->update();
            } else {
                Rating::create([
                    'user_id' => Auth::id(),
                    'umkm_id' => $umkm_id,
                    'stars_rated' => $stars_rated,
                    'review' => $review,
                ]);
            }
            return redirect()->back()->with('status', 'Thankyou for rating this product');
        } else {
            return redirect()->back()->with('status', 'The link you followed was broken!');
        }
    }
}
