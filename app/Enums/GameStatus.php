<?php

namespace App\Enums;

enum GameStatus: string
{
    case Win = 'WIN';
    case InProgress = 'IN-PROGRESS';
    case Lose = 'LOSE';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
