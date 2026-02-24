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
            @if (Auth::check())
                <li><a href="/dashboard">Dashboard Admin</a></li>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit"
                        style="background: none; border: none; padding: 0; cursor: pointer; color: blue; text-decoration: underline;">Logout</button>
                </form>
            @else
                <li><a href="{{ route('show.login') }}">Login</a></li>
                <li><a href="{{ route('show.register') }}">Register</a></li>
            @endif
            @if (Auth::user() && Auth::user()->is_admin)
                <li><a href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
            @endif
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">
            <h2>Welcome to Dashboard</h2>
            <p>This is your dashboard content area.</p>

            <h3>Registered Users</h3>
            <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f0f0f0;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
