<?php
// File: app/Http/Controllers/API/ReviewController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Mail\NewReviewNotification;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();
        return ReviewResource::collection($reviews);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required_if:rating,<,3|string|min:5|max:1000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $review = Review::create($validator->validated());

        // Kirim notifikasi email
        Mail::to('admin@miemapanponti.com')->send(new NewReviewNotification($review));

        return new ReviewResource($review);
    }
}