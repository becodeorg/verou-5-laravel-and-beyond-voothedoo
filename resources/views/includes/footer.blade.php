<footer>
    <div>
        <p>@TicketEase - made by <a href="https://github.com/voothedoo">Alexandru Munteanu</a></p>
        @auth()
            <p>Logged In as <span>{{ auth()->user()->name }}</span></p>
        @endauth
    </div>
</footer>
