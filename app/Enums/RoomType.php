<?php

namespace App\Enums;

use App\Traits\EnumHandler;

enum RoomType: string
{
    use EnumHandler;

    case SINGLE = 'single';
    case DOUBLE = 'double';
    case SUITE = 'suite';
}
