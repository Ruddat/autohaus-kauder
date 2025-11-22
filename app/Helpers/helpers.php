<?php

use App\Models\OpeningException;

class_alias(\App\Helpers\Settings::class, 'Settings');


function next_exception_with_note_from_any()
{
    $sales = OpeningException::where('department', 'sales')
        ->whereDate('date', '>=', now()->toDateString())
        ->whereNotNull('note')
        ->where('note', '!=', '')
        ->orderBy('date', 'asc')
        ->first();

    $workshop = OpeningException::where('department', 'workshop')
        ->whereDate('date', '>=', now()->toDateString())
        ->whereNotNull('note')
        ->where('note', '!=', '')
        ->orderBy('date', 'asc')
        ->first();

    // beide existieren
    if ($sales && $workshop) {
        return $sales->date <= $workshop->date ? $sales : $workshop;
    }

    // nur einer existiert
    return $sales ?: $workshop;
}


function opening_week(string $department = 'sales')
{
    return \App\Models\OpeningHour::where('department', $department)
        ->orderBy('weekday')
        ->get()
        ->map(function($day) {
            return [
                'weekday' => \App\Models\OpeningHour::weekdayName($day->weekday),
                'opens' => $day->opens,
                'closes' => $day->closes,
                'is_closed' => $day->is_closed,
            ];
        });
}


function fmt($time)
{
    return $time ? substr($time, 0, 5) : '';
}

function opening_week_grouped(string $department = 'sales')
{
    $days = opening_week($department); // vorhandener Helper

    $groups = [];
    $current = null;

    foreach ($days as $day) {
        $open = $day['is_closed'] ? 'closed' : fmt($day['opens']) . '–' . fmt($day['closes']);

        if (!$current) {
            $current = [
                'from' => $day['weekday'],
                'to' => $day['weekday'],
                'time' => $open
            ];
            continue;
        }

        // gleiche Uhrzeit → Gruppe fortsetzen
        if ($current['time'] === $open) {
            $current['to'] = $day['weekday'];
        } else {
            $groups[] = $current;
            $current = [
                'from' => $day['weekday'],
                'to' => $day['weekday'],
                'time' => $open
            ];
        }
    }

    $groups[] = $current;

    return $groups;
}

function short_day(string $day)
{
    return match($day) {
        'Montag' => 'Mo',
        'Dienstag' => 'Di',
        'Mittwoch' => 'Mi',
        'Donnerstag' => 'Do',
        'Freitag' => 'Fr',
        'Samstag' => 'Sa',
        'Sonntag' => 'So',
        default => $day,
    };
}
