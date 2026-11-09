
@extends('layouts.app')

@section('title', 'My Profile - GameVault')

@section('content')

<div class="profile-page">

    {{-- PROFILE HEADER --}}
    <section class="profile-header">

        <div class="profile-avatar">
            <img
                src="{{ asset('images/profile/avatar.jpeg') }}"
                alt="Profile Avatar"
            >
        </div>

        <div class="profile-identity">
            <p class="subtitle">PLAYER PROFILE</p>

            <h1>{{ $profile['username'] }}</h1>

            <div class="profile-badges">
                <span class="profile-role">{{ $profile['role'] }}</span>
                <span class="profile-active">Active Player</span>
            </div>

            <p class="profile-description">
                {{ $profile['platform'] }} Gamer
                <span>•</span>
                Member since {{ $profile['member_since'] }}
            </p>
        </div>

    </section>


    {{-- GAMING STATISTICS --}}
    <section class="profile-stats">

        <div class="profile-stat-card">
            <div class="stat-icon purple">🎮</div>
            <div>
                <h2>{{ $totalGames }}</h2>
                <p>Total Games</p>
            </div>
        </div>

        <div class="profile-stat-card">
            <div class="stat-icon blue">⏱</div>
            <div>
                <h2>{{ number_format($totalHours) }}</h2>
                <p>Total Hours Played</p>
            </div>
        </div>

        <div class="profile-stat-card">
            <div class="stat-icon pink">♥</div>
            <div>
                <h2>{{ $totalFavorites }}</h2>
                <p>Favorite Games</p>
            </div>
        </div>

    </section>


    {{-- FAVORITE GAMES --}}
    <section class="favorite-section">

        <div class="section-heading">
            <div>
                <p class="subtitle">YOUR TOP PICKS</p>
                <h2>Favorite Games</h2>
                <p>Your most loved games in the collection.</p>
            </div>

            <span class="favorite-count">
                {{ $totalFavorites }} Favorites
            </span>
        </div>


        @if ($featuredFavorite)

            {{-- FEATURED FAVORITE --}}
            <div class="favorite-featured">

                <div class="favorite-featured-image">
                    <img
                        src="{{ asset('images/' . $featuredFavorite['image']) }}"
                        alt="{{ $featuredFavorite['title'] }}"
                    >
                </div>

                <div class="favorite-featured-content">

                    <span class="featured-label">
                        ♥ FEATURED FAVORITE
                    </span>

                    <h2>{{ $featuredFavorite['title'] }}</h2>

                    <p>
                        {{ $featuredFavorite['genre'] }}
                        <span>•</span>
                        {{ $featuredFavorite['platform'] }}
                    </p>

                    <div class="featured-hours">
                        <strong>{{ $featuredFavorite['hours'] }}</strong>
                        <span>Hours Played</span>
                    </div>

                    <span class="game-status">
                        {{ $featuredFavorite['status'] }}
                    </span>

                </div>

            </div>


            {{-- OTHER FAVORITES --}}
            @if ($otherFavoriteGames->isNotEmpty())

                <div class="other-favorites">

                    @foreach ($otherFavoriteGames as $game)

                        <div class="other-favorite-card">

                            <img
                                src="{{ asset('images/' . $game['image']) }}"
                                alt="{{ $game['title'] }}"
                            >

                            <div>
                                <h3>{{ $game['title'] }}</h3>

                                <p>{{ $game['genre'] }}</p>

                                <span>
                                    {{ $game['hours'] }} Hours Played
                                </span>
                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        @else

            <p class="empty-favorites">
                You haven't added any favorite games yet.
            </p>

        @endif

    </section>


    {{-- ADDITIONAL PROFILE INFORMATION --}}
    <section class="profile-information">

        <p class="subtitle">ABOUT PLAYER</p>
        <h2>Gaming Information</h2>

        <div class="profile-info-grid">

            <div>
                <span>Username</span>
                <strong>{{ $profile['username'] }}</strong>
            </div>

            <div>
                <span>Role</span>
                <strong>{{ $profile['role'] }}</strong>
            </div>

            <div>
                <span>Platform</span>
                <strong>{{ $profile['platform'] }}</strong>
            </div>

            <div>
                <span>Member Since</span>
                <strong>{{ $profile['member_since'] }}</strong>
            </div>

            <div>
                <span>Favorite Genre</span>
                <strong>{{ $profile['favorite_genre'] }}</strong>
            </div>

        </div>

    </section>

</div>

@endsection
