<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('blog.index') }}">Blog Personal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('blog.index') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('other.about') }}">About</a>
          </li>

             @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Bienvenido</a>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                          </li>
                        @endif
                    @endauth
                </div>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>



        </ul>

      </div>
    </div>
  </nav>
