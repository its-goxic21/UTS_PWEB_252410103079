@extends('layouts.app')

@section('title', 'Dashboard - GameVault')

@section('content')

<div class="dashboard-page">

    <section class="dashboard-heading">
        <div>
            <p class="section-eyebrow">PLAYER DASHBOARD</p>
            <h1>Welcome back, {{ $username }}!</h1>
            <p>Your gaming journey continues here.</p>
        </div>

        <div class="player-badge">
            <span>🎮</span>
            PLAYER
        </div>
    </section>

    {{-- STATISTICS --}}
    <section class="dashboard-stats">

        <div class="dashboard-stat">
            <span>Total Games</span>
            <h2>{{ $totalGames }}</h2>
            <small>Games in your vault</small>
        </div>

        <div class="dashboard-stat">
            <span>Currently Playing</span>
            <h2>{{ $playingGames }}</h2>
            <small>Games in progress</small>
        </div>

        <div class="dashboard-stat">
            <span>Completed</span>
            <h2>{{ $completedGames }}</h2>
            <small>Finished adventures</small>
        </div>

    </section>

    {{-- FEATURED GAME --}}
    @if ($recentGames->isNotEmpty())

    @php
        $featured = $recentGames->first();
    @endphp

    <section class="featured-section">

        <div class="section-title">
            <div>
                <p class="section-eyebrow">YOUR LATEST ADVENTURE</p>
                <h2>Recently Played</h2>
            </div>
        </div>

        <div class="featured-game"
            style="background-image:
                linear-gradient(90deg, rgba(8,13,25,.96), rgba(8,13,25,.25)),
                url('{{ asset('images/' . $featured['image']) }}');">

            <div class="featured-content">

                <span class="featured-label">LAST PLAYED</span>

                <h2>{{ $featured['title'] }}</h2>

                <p>{{ $featured['genre'] }} · {{ $featured['platform'] }}</p>

                <div class="featured-meta">
                    <span>{{ $featured['hours'] }} Hours Played</span>
                    <span>{{ $featured['status'] }}</span>
                </div>

                <a href="{{ route('pengelolaan', ['username' => $username]) }}"
                   class="featured-button">
                    VIEW GAME LIBRARY →
                </a>

            </div>

        </div>

    </section>

    @endif

    {{-- THREE RECENT GAMES --}}
    <section class="recent-section">

        <div class="section-title">
            <div>
                <p class="section-eyebrow">BACK TO YOUR ADVENTURES</p>
                <h2>Recently Played Games</h2>
            </div>

            <a href="{{ route('pengelolaan', ['username' => $username]) }}">
                VIEW ALL →
            </a>
        </div>

        <div class="recent-game-list">

            @foreach ($recentGames as $game)

            <article class="recent-game-card">

                <img
                    src="{{ asset('images/' . $game['image']) }}"
                    alt="{{ $game['title'] }}"
                >

                <div class="recent-game-info">

                    <h3>{{ $game['title'] }}</h3>

                    <p>{{ $game['genre'] }}</p>

                    <div class="recent-game-meta">
                        <span>{{ $game['hours'] }} hrs</span>
                        <span>{{ $game['status'] }}</span>
                    </div>

                </div>

                <div class="recent-date">
                    {{ \Carbon\Carbon::parse($game['last_played'])->format('d M Y') }}
                </div>

            </article>

            @endforeach

        </div>

    </section>

</div>

@endsection
