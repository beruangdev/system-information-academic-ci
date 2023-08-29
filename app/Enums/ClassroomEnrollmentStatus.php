<?php

namespace App\Enums;


final class ClassroomEnrollmentStatus
{
    const PENDING = "pending";
    const APPROVED = "approved";
    const REJECTED = "rejected";


    public static function values(): array
    {
        $reflectionClass = new ReflectionClass(self::class);
        return array_values($reflectionClass->getConstants());
    }
}