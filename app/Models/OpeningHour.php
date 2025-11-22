<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = [
        'department','weekday','opens','closes','is_closed'
    ];

    public const DEPARTMENTS = ['sales','workshop'];

    public static function weekdayName(int $weekday): string
    {
        return [
            1 => 'Montag',
            2 => 'Dienstag',
            3 => 'Mittwoch',
            4 => 'Donnerstag',
            5 => 'Freitag',
            6 => 'Samstag',
            7 => 'Sonntag',
        ][$weekday] ?? 'Unbekannt';
    }
}
