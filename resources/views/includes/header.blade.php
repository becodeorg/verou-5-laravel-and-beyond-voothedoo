<header>
    <div class="logo">
        <h1 class="logo"><a href="/"> @TicketEase</a></h1>
    </div>
    <nav>
        <ul class="nav links">
            <li><a href="/">Home</a></li>
            <li><a href="/issues">Tickets</a></li>
            @auth()
                <li><a href="{{ route('createIssue') }}">Create Ticket</a></li>
                <li><a href="">Profile</a></li>
                <li><a href="{{ route('logout') }}" class="login-logout">Logout</a></li>
            @endauth
            @guest
                <li><a href="/register" class="login-logout">Login/Register</a></li>
            @endguest
        </ul>
    </nav>
</header>
