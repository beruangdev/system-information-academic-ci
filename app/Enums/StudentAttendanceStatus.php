<?php

namespace App\Enums;

final class StudentAttendanceStatus 
{
    const PRESENT = "present";
    const ABSENT = "absent";

    public static function values(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        return array_values($reflectionClass->getConstants());
    }
}
