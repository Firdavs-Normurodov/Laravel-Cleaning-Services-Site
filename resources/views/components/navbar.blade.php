<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        {{-- {{ dump($current_locale) }} --}}
        <div class="navbar-nav mr-auto py-0">
            <a href="/" class="nav-item nav-link ">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('About') }}</a>
            <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
            <a href="{{ route('project') }}" class="nav-item nav-link">Project</a>
            <a href="{{ route('posts.index') }}" class="nav-item nav-link">Blog</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        {{-- @foreach ($all_locales as $locale)
            <a href={{ route('change.locale', ['locale' => $locale]) }} class="btn btn-primary mr-2 d-none d-lg-block">
                {{ $locale }}
            </a>
        @endforeach --}}

        @auth

            <a href="{{ route('notifications.index') }}" class="btn d-flex align-items-center">
                <i class="fa-solid fa-bell" style="font-size: 1.5rem;color:red"></i>
                <span class="badge "style="color:red">{{ auth()->user()->unreadNotifications()->count() }}</span>
            </a>


            <a href="{{ route('posts.create') }}" class="btn btn-primary mr-2 d-none d-lg-block">Post Create</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-dark mr-2 d-none d-lg-block" type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-2 d-none d-lg-block">Login</a>

        @endauth
    </div>
</nav>
