<?php

namespace App\Enum;

enum Unit: string
{
    case PIECE = 'piece';
    case HOUR  = 'hour';
    case DAY   = 'day';
    case MONTH = 'month';
    case YEAR  = 'year';

    public function getLabel(): string
    {
        return match($this) {
            Unit::PIECE => 'Pièce',
            Unit::HOUR  => 'Heure',
            Unit::DAY   => 'Jour',
            Unit::MONTH => 'Mois',
            Unit::YEAR  => 'Année',
        };
    }
}