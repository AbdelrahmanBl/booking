<?php

namespace App\Traits;

trait EnumHandler
{
    public static function options()
    {
        $class = class_basename(self::class);

        return collect(static::cases())->map(fn($case) => [
            'label' => __("enums.{$class}.{$case->value}"),
            'value' => $case,
        ]);
    }

    public static function values()
    {
        return collect(static::cases())
        ->map(fn($item) => $item->value)
        ->toArray();
    }
}
