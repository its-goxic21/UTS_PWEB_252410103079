
@extends('layouts.app')

@section('title', 'Game Library - GameVault')

@section('content')

<div class="library-page">

    <div class="library-heading">
        <div>
            <p class="subtitle">YOUR COLLECTION</p>
            <h1>Game Library</h1>
            <p>Welcome back, {{ $username }}! Manage your gaming collection.</p>
        </div>

        <div class="library-total">
            <span>{{ count($games) }}</span>
            <small>Games Collection</small>
        </div>
    </div>

    <div class="library-toolbar">

        <div class="search-box">
            <span>⌕</span>
            <input
                type="text"
                id="searchGame"
                placeholder="Search your games..."
            >
        </div>

        <select id="statusFilter">
            <option value="">All Status</option>
            <option value="playing">Playing</option>
            <option value="completed">Completed</option>
            <option value="on hold">On Hold</option>
            <option value="dropped">Dropped</option>
            <option value="backlog">Backlog</option>
        </select>

    </div>

    <div class="library-list" id="gameList">

        @foreach ($games as $game)

        <div class="library-game-card">

            <div class="library-game-image">
                <img
                    src="{{ asset('images/' . $game['image']) }}"
                    alt="{{ $game['title'] }}"
                >
            </div>

            <div class="library-game-info">

                <div class="game-main-info">
                    <h3>{{ $game['title'] }}</h3>

                    <p>
                        {{ $game['genre'] }}
                        <span>•</span>
                        {{ $game['platform'] }}
                    </p>
                </div>

                <div class="game-extra-info">

                    <div class="game-hours">
                        <span>{{ $game['hours'] }}</span>
                        <small>Hours Played</small>
                    </div>

                    <span class="game-status
                        status-{{ strtolower(str_replace(' ', '-', $game['status'])) }}">
                        {{ $game['status'] }}
                    </span>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <p id="emptyMessage" class="empty-message" hidden>
        No games found.
    </p>

</div>

@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('searchGame');
    const statusFilter = document.getElementById('statusFilter');
    const gameCards = document.querySelectorAll('.library-game-card');
    const emptyMessage = document.getElementById('emptyMessage');

    function filterGames() {
        const keyword = searchInput.value.toLowerCase();
        const selectedStatus = statusFilter.value.toLowerCase();

        let visibleCount = 0;

        gameCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const genre = card.querySelector('.game-main-info p').textContent.toLowerCase();
            const status = card.querySelector('.game-status').textContent.trim().toLowerCase();

            const matchesSearch =
                title.includes(keyword) || genre.includes(keyword);

            const matchesStatus =
                selectedStatus === '' || status === selectedStatus;

            const isVisible = matchesSearch && matchesStatus;

            card.style.display = isVisible ? '' : 'none';

            if (isVisible) {
                visibleCount++;
            }
        });

        emptyMessage.hidden = visibleCount > 0;
    }

    searchInput.addEventListener('input', filterGames);
    statusFilter.addEventListener('change', filterGames);
</script>
@endpush
