<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getGames(): array
{
    $games = [
        [
            'title' => 'Devil May Cry 5',
            'genre' => 'Action RPG',
            'platform' => 'PC',
            'status' => 'Playing',
            'hours' => 9,
            'last_played' => '2026-11-08',
            'is_favorite' => false,
            'image' => 'games/dmc5.jpg',
        ],
        [
            'title' => 'Going Medieval',
            'genre' => 'Colony Sim',
            'platform' => 'PC',
            'status' => 'Playing',
            'hours' => 137,
            'last_played' => '2026-11-09',
            'is_favorite' => true,
            'image' => 'games/going-medieval.jpg',
        ],
        [
            'title' => 'Minecraft',
            'genre' => 'Sandbox',
            'platform' => 'PC',
            'status' => 'Playing',
            'hours' => 193,
            'last_played' => '2026-11-07',
            'is_favorite' => true,
            'image' => 'games/minecraft.jpg',
        ],
        [
            'title' => 'Age Of Empire IV',
            'genre' => 'RTS',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 56,
            'last_played' => '2026-10-28',
            'is_favorite' => true,
            'image' => 'games/aoe4.jpg',
        ],
        [
            'title' => 'Elden Ring',
            'genre' => 'Action RPG',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 4,
            'last_played' => '2026-06-05',
            'is_favorite' => false,
            'image' => 'games/elden-ring.jpg',
        ],
        [
            'title' => 'Stronghold 2',
            'genre' => 'RTS',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 78,
            'last_played' => '2026-09-01',
            'is_favorite' => false,
            'image' => 'games/stronghold2.jpg',
        ],
        [
            'title' => 'Stardew Valley',
            'genre' => 'Farming Sim',
            'platform' => 'PC',
            'status' => 'Completed',
            'hours' => 29,
            'last_played' => '2026-01-13',
            'is_favorite' => false,
            'image' => 'games/stardew-valley.jpg',
        ],
        [
            'title' => 'Kingdom Two Crowns',
            'genre' => 'Tower Defense',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 11,
            'last_played' => '2026-06-03',
            'is_favorite' => false,
            'image' => 'games/ktc.jpg',
        ],
        [
            'title' => 'Age Of Empire II: Definitive Edition',
            'genre' => 'RTS',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 197,
            'last_played' => '2026-11-03',
            'is_favorite' => true,
            'image' => 'games/aoe2.jpg',
        ],
        [
            'title' => 'Terraria',
            'genre' => 'Sandbox',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 8,
            'last_played' => '2026-07-19',
            'is_favorite' => false,
            'image' => 'games/terraria.jpg',
        ],
        [
            'title' => 'Valorant',
            'genre' => 'FPS',
            'platform' => 'PC',
            'status' => 'Playing',
            'hours' => 0,
            'last_played' => '2026-11-08',
            'is_favorite' => true,
            'image' => 'games/valorant.jpg',
        ],
        [
            'title' => 'The Witcher III: Wild Hunt - Remastered',
            'genre' => 'Action RPG',
            'platform' => 'PC',
            'status' => 'On Hold',
            'hours' => 4,
            'last_played' => '2026-03-25',
            'is_favorite' => false,
            'image' => 'games/the-witcher.jpg',
        ],
    ];

    return $games;
}
    public function dashboard(Request $request)
{
    $username = $request->query('username', 'Player');

    $games = $this->getGames();

    $recentGames = collect($games)
    ->filter(fn ($game) => $game['last_played'] !== null)
    ->sortByDesc('last_played')
    ->take(3)
    ->values();

    $totalGames = count($games);

    $playingGames = collect($games)
        ->where('status', 'Playing')
        ->count();

    $completedGames = collect($games)
        ->where('status', 'Completed')
        ->count();

    return view('dashboard', compact(
        'username',
        'games',
        'recentGames',
        'totalGames',
        'playingGames',
        'completedGames'
    ));
}

    public function login()
    {
        return view('login');
    }

    public function profile(Request $request)
{
    $username = $request->query('username', 'Player');

    $profile = [
        'username' => $username,
        'role' => 'Gamer',
        'platform' => 'PC',
        'member_since' => 'November 7 2026',
        'favorite_genre' => 'RTS, Colony Sim, Action RPG, Indie',
    ];

    $games = $this->getGames();

    $favoriteGames = collect($games)
        ->where('is_favorite', true)
        ->values();

    $featuredFavorite = $favoriteGames->first();

    $otherFavoriteGames = $favoriteGames->skip(1)->values();

    $totalGames = count($games);

    $totalHours = collect($games)->sum('hours');

    $totalFavorites = $favoriteGames->count();

    return view('profile', compact(
        'username',
        'profile',
        'totalGames',
        'totalHours',
        'totalFavorites',
        'featuredFavorite',
        'otherFavoriteGames'
    ));
}

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Player');

        $games = $this->getGames();

        return view('pengelolaan', compact('username', 'games'));
    }
}
