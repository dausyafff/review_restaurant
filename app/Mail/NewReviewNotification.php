<?php
// File: app/Mail/NewReviewNotification.php
namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewReviewNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->subject('Ulasan Baru di Mie Mapan Ponti')
            ->view('emails.review_notification')
            ->with([
                'name' => $this->review->name ?? 'Anonim',
                'rating' => $this->review->rating,
                'comment' => $this->review->comment,
            ]);
    }
}