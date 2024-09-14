<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom mb-0 d-flex">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="{{ url('/') }}">{{ __('public.Library') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav  ms-auto me-0" id="navbarNav">
      <ul class="navbar-nav d-flex flex-row align-items-center " >
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">{{ __('public.home') }}</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link" href="{{ route('login') }}">{{ __('public.login') }}</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link" href="{{ route('register') }}">{{ __('public.register') }}</a>
        </li>
        <li class="nav-item">
          @include('partials.langouge')
        </li>
      </ul>
    </div>
  </div>
</nav>
