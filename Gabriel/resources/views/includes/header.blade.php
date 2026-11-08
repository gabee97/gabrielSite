<nav id="nav-header" class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
    <div class="container">
        <a @if(request()->routeIs('home')) aria-current="page" @endif class="navbar-brand" title="@lang('messages.back-home')" href="{{ route('home') }}">
            @lang('messages.gabriel-complete-name')
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="@lang('messages.toggle_navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-lg-auto align-items-lg-center">
                <li class="nav-item" id="nav-skills">
                    <a class="nav-link" @if(request()->routeIs('skills')) aria-current="page" @endif href="{{ route('skills') }}">@lang('messages.skills')</a>
                </li>
                <li class="nav-item" id="nav-experiences">
                    <a class="nav-link" @if(request()->routeIs('experiences')) aria-current="page" @endif href="{{ route('experiences') }}">@lang('messages.experiences')</a>
                </li>
                <li class="nav-item" id="nav-about">
                    <a class="nav-link" @if(request()->routeIs('about')) aria-current="page" @endif href="{{ route('about') }}">@lang('messages.about')</a>
                </li>
                <li class="nav-item" id="nav-contacts">
                    <a class="nav-link" @if(request()->routeIs('contacts')) aria-current="page" @endif href="{{ route('contacts') }}">@lang('messages.contacts')</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#projects">@lang('portfolio.projects')</a></li>
                <li class="nav-item language-switcher">
                    @foreach(['pt' => 'Português', 'en' => 'English'] as $code => $label)
                    <a class="nav-link" href="{{ route(request()->route()->getName(), ['locale' => $code]) }}" hreflang="{{ $code === 'pt' ? 'pt-BR' : 'en' }}" lang="{{ $code }}" aria-label="{{ $label }}" @if(request()->route('locale') === $code) aria-current="true" @endif>{{ strtoupper($code) }}</a>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</nav>
