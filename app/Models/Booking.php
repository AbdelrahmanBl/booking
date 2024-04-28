<?php

namespace App\Models;

use App\Enums\BookingStatus;
use App\Traits\TimestampsFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property object user
 * @property int room_id
 * @property object room
 * @property object status
 * @property string status_text
 * @property string booking_number
 */
class Booking extends Model
{
    use HasFactory,
        TimestampsFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'room_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => BookingStatus::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'status_text',
        'booking_number',
    ];

    public function getStatusTextAttribute()
    {
        return __("enums.BookingStatus.{$this->status->value}");
    }

    public function getBookingNumberAttribute()
    {
        return '#BOK-' . $this->id;
    }

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the room that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
