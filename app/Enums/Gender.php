<?php

namespace App\Enums;

final class Gender
{
    const MALE = "male";
    const FEMALE = "female";
    const OTHER = "other";

    public static function values(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        return array_values($reflectionClass->getConstants());
    }
}