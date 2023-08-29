<?php

namespace App\Enums;

final class StudentStatus
{
    const ACTIVE = "active";
    const INACTIVE = "inactive";
    const GRADUATE = "graduate";
    const DROPOUT = "dropout";

    public static function values(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        return array_values($reflectionClass->getConstants());
    }
}