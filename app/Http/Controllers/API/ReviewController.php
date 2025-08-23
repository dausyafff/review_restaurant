<?php
// File: app/Http/Controllers/API/ReviewController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Jobs\SendReviewNotificationJob;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = cache()->remember('reviews', 60, function () {
            return Review::select('id', 'name', 'rating', 'comment', 'created_at')
                ->latest()
                ->take(50) // Batasi 50 ulasan untuk performa
                ->get();
        });
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

        $data = $validator->validated();
        $data['name'] = $data['name'] ?? 'Pelanggan';
        $review = Review::create($data);

        SendReviewNotificationJob::dispatch($review);
        cache()->forget('reviews');

        return new ReviewResource($review);
    }
}