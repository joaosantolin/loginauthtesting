<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav>
        <ul>
            @if(Auth::check())
                <li><a href="/dashboard">Dashboard</a></li>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: blue; text-decoration: underline;">Logout</button>
                </form>
            @else
                <li><a href="{{ route('show.login') }}">Login</a></li>
                <li><a href="{{ route('show.register') }}">Register</a></li>
            @endif
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Welcome to Dashboard</h2>
            <p>This is your dashboard content area.</p>
        </div>
    </div>
</body>
</html>
