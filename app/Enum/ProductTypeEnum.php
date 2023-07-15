<?php

namespace App\Enum;

enum ProductTypeEnum: string
{
    case DVD = 'dvd';
    case BOOK = 'book';
    case FURNITURE = 'furniture';

    public static function getTypes(): array
    {
        return [
            self::DVD->value,
            self::BOOK->value,
            self::FURNITURE->value,
        ];
    }

    public static function getRules(): string
    {
        return 'enum:' . implode(',', self::getTypes());
    }
}