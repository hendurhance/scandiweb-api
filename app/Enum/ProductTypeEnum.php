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
            self::DVD,
            self::BOOK,
            self::FURNITURE,
        ];
    }
}