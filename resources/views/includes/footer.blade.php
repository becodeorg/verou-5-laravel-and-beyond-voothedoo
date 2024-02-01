<footer>
    <div>
        @auth()
            <p>Logged In as <span>{{ auth()->user()->name }}</span></p>
        @endauth
        <p>@TicketEase - made by <a href="https://github.com/voothedoo">Alexandru Munteanu</a></p>
    </div>
</footer>
