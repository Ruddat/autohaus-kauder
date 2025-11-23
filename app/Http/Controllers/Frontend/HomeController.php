<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vehicle;
use App\Models\Badge;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Badge IDs holen
        $badgeTop  = Badge::where('label', 'TOP')->first()?->id;
        $badgeSale = Badge::where('label', 'SALE')->first()?->id;
        $badgeNew  = Badge::where('label', 'NEU')->first()?->id;

        // Helper: Fahrzeugliste mit Limit + Fallback
        $getVehicles = function ($badgeId, $fallbackBadgeIds = [], $limit = 4) {
            $vehicles = collect();

            // 1️⃣ Erstes Badge holen
            if ($badgeId) {
                $vehicles = Vehicle::where('badge_id', $badgeId)
                    ->with('images')
                    ->take($limit)
                    ->get();
            }

            // 2️⃣ Fallback-Badges nutzen (falls zu wenige)
            if ($vehicles->count() < $limit && !empty($fallbackBadgeIds)) {
                foreach ($fallbackBadgeIds as $fallback) {
                    if ($vehicles->count() >= $limit) break;

                    $needed = $limit - $vehicles->count();

                    $extra = Vehicle::where('badge_id', $fallback)
                        ->with('images')
                        ->take($needed)
                        ->get();

                    $vehicles = $vehicles->concat($extra);
                }
            }

            // 3️⃣ Wenn immer noch zu wenig → wild nachfüllen (neueste Fahrzeuge)
            if ($vehicles->count() < $limit) {
                $needed = $limit - $vehicles->count();

                $fallbackExtra = Vehicle::orderBy('created_at', 'desc')
                    ->with('images')
                    ->whereNotIn('id', $vehicles->pluck('id')) // keine doppelten
                    ->take($needed)
                    ->get();

                $vehicles = $vehicles->concat($fallbackExtra);
            }

            return $vehicles;
        };

        return view('frontend.home', [
            // NEU: weiterhin einfachste Abfrage
            'newVehicles' => Vehicle::orderBy('created_at', 'desc')
                ->with('images')
                ->take(4)
                ->get(),

            // TOP-Fahrzeuge → FALLBACK: NEU → ABSCHLIESSEND: alles
            'topVehicles' => $getVehicles(
                $badgeTop,
                [$badgeNew]
            ),

            // SALE → FALLBACK: TOP → FALLBACK: NEU → Fallback: allgemein
            'hotDeals' => $getVehicles(
                $badgeSale,
                [$badgeTop, $badgeNew]
            ),
        ]);
    }
}
