<footer>
    <div>
        @auth()
            <p>Logged In as <span>{{ auth()->user()->name }}</span></p>
        @endauth
        @guest
            <p>Unknown User - Limited functionality for unknown users </p>
        @endguest
        <p>@TicketEase - made by <a href="https://github.com/voothedoo">Alexandru Munteanu</a></p>
    </div>
</footer>
