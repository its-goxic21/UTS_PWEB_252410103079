@extends('layouts.app')

@section('title', 'Welcome to GameVault')

@section('content')

<div class="login-screen">

    <div class="login-content">

        <div class="login-brand">
            <span>🎮</span>
            <span>GAMEVAULT</span>
        </div>

        <div class="login-heading">

            <p class="login-eyebrow">
                YOUR NEXT ADVENTURE STARTS HERE
            </p>

            <h1>
                Welcome to <span>GameVault.</span>
            </h1>

            <p>
                Your gaming journey starts here.
                Enter your username to continue.
            </p>

        </div>

        <form action="{{ route('dashboard') }}" method="GET">

            <label for="username">PLAYER USERNAME</label>

            <div class="login-input-wrapper">
                <span>👤</span>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username..."
                    maxlength="30"
                    required
                    autocomplete="off"
                >
            </div>

            <button type="submit" class="login-button">
                <span>ENTER GAMEVAULT</span>
                <span>→</span>
            </button>

        </form>

        <div class="login-bottom">
            <span></span>
            YOUR GAMES, YOUR COLLECTION.
            <span></span>
        </div>

    </div>

    <div class="login-copyright">
        © 2026 GAMEVAULT. ALL RIGHTS RESERVED.
    </div>

</div>

@endsection
