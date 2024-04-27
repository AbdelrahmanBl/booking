<?php

namespace App\Models;

use App\Enums\RoomStatus;
use App\Enums\RoomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string description
 * @property object type
 * @property string type_text
 * @property object status
 * @property string status_text
 */
class Room extends Model
{
    use HasFactory;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => RoomType::class,
        'status' => RoomStatus::class,
    ];

    public function getTypeTextAttribute()
    {
        return __("enums.RoomType.{$this->type->value}");
    }

    public function getStatusTextAttribute()
    {
        return __("enums.RoomStatus.{$this->status->value}");
    }
}
