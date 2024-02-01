<header>
    <div class="logo">
        <h1>Track Issues</h1>
    </div>
    <nav>
        <ul class="nav links">
            <li><a href="/">Home</a></li>
            <li><a href="/issues">Issues</a></li>
            @auth()
                <li><a href="{{ route('createIssue') }}">Create Issue</a></li>
                <li><a href="">Profile</a></li>
                <li><a href="">Logout</a></li>
            @endauth
            @guest
                <li><a href="/register">Login/Register</a></li>
            @endguest
        </ul>
    </nav>
</header>
