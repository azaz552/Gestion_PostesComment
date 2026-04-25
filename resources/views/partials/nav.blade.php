<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">

        <a class="navbar-brand" href="/">MyApp</a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            ☰
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Posts</a>
                </li>
            </ul>

            <ul class="navbar-nav">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.index') }}">
                            {{ auth()->user()->name }}
                        </a>                    
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-light">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>