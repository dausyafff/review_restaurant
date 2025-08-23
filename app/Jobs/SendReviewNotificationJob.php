<?php
// File: app/Jobs/SendReviewNotificationJob.php
namespace App\Jobs;

use App\Mail\NewReviewNotification;
use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReviewNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function handle()
    {
        Mail::to('muhammaddausyaf@gmail.com')->send(new NewReviewNotification($this->review));
    }
}