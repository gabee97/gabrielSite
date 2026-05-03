<nav id="nav-header" class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand" title="@lang('messages.back-home')" href="{{ route('home') }}">
            @lang('messages.gabriel-complete-name')
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="@lang('messages.toggle_navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-lg-auto align-items-lg-center">
                <li class="nav-item" id="nav-skills">
                    <a class="nav-link" href="{{ route('skills') }}">@lang('messages.skills')</a>
                </li>
                <li class="nav-item" id="nav-experiences">
                    <a class="nav-link" href="{{ route('experiences') }}">@lang('messages.experiences')</a>
                </li>
                <li class="nav-item" id="nav-about">
                    <a class="nav-link" href="{{ route('about') }}">@lang('messages.about')</a>
                </li>
                <li class="nav-item" id="nav-contacts">
                    <a class="nav-link" href="{{ route('contacts') }}">@lang('messages.contacts')</a>
                </li>
                <li class="nav-item nav-social">
                    <a class="nav-link" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank" rel="noopener noreferrer" aria-label="@lang('messages.contact_linkedin')">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li class="nav-item nav-social">
                    <a class="nav-link" href="https://www.instagram.com/oliveiragabee_/" target="_blank" rel="noopener noreferrer" aria-label="@lang('messages.contact_instagram')">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="nav-item nav-social">
                    <a class="nav-link" href="https://wa.me/+5541987694868?text=@lang('messages.contact_whatsapp_prefill')" target="_blank" rel="noopener noreferrer" aria-label="@lang('messages.contact_whatsapp')">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
                <li class="nav-item language-switcher">
                    <a href="{{ route('change.language', 'pt_BR') }}" class="nav-link" aria-label="Português">
                        <img src="https://flagcdn.com/w40/br.png" alt="Português" width="24" height="16">
                    </a>
                    <a href="{{ route('change.language', 'en') }}" class="nav-link" aria-label="English">
                        <img src="https://flagcdn.com/w40/us.png" alt="English" width="24" height="16">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
