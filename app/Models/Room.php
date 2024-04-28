<?php

namespace App\Models;

use App\Builders\RoomBuilder;
use App\Enums\RoomStatus;
use App\Enums\RoomType;
use App\Traits\TimestampsFormat;
use Bl\LaravelUploadable\Casts\FileCast;
use Bl\LaravelUploadable\Traits\FileCastRemover;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string description
 * @property object type
 * @property string type_text
 * @property object status
 * @property string status_text
 * @property double price
 * @property string price_text
 * @property string image
 */
class Room extends Model
{
    use HasFactory,
        TimestampsFormat,
        FileCastRemover;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'status',
        'price',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => RoomType::class,
        'status' => RoomStatus::class,
        'price' => 'double',
        'image' => FileCast::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'type_text',
        'status_text',
        'price_text',
    ];

    public function getTypeTextAttribute()
    {
        return __("enums.RoomType.{$this->type->value}");
    }

    public function getStatusTextAttribute()
    {
        return __("enums.RoomStatus.{$this->status->value}");
    }

    public function getPriceTextAttribute()
    {
        return $this->price . ' SAR';
    }

    /**
     * Scope a query to only include available
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public static function query(): RoomBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): RoomBuilder
    {
        return new RoomBuilder($query);
    }
}
