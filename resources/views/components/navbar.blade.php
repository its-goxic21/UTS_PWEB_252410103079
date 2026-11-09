<nav>
    <div class="logo">
        <h2>🎮 GameVault</h2>
    </div>

    <div class="nav-links">

        <a href="{{ route('dashboard', ['username' => request()->query('username', 'Player')]) }}">
            Dashboard
        </a>

        <a href="{{ route('pengelolaan', ['username' => request()->query('username', 'Player')]) }}">
            Game Library
        </a>

        <a href="{{ route('profile', ['username' => request()->query('username', 'Player')]) }}">
            Profile
        </a>

    </div>
</nav>
