<?php

namespace App\Models;

use App\Enums\EmployeeType;
use App\Traits\TimestampsFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property object type
 * @property string type_text
 * @property bool is_active
 * @property bool is_admin
 */
class Employee extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        TimestampsFormat;

    const SUPER_ADMIN_EMAIL = 'admin@booking.com';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'type' => EmployeeType::class,
        'is_active' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'type_text',
    ];

    public function getTypeTextAttribute()
    {
        return __("enums.EmployeeType.{$this->type->value}");
    }

    public function getIsAdminAttribute()
    {
        return $this->type === EmployeeType::ADMIN;
    }
}
