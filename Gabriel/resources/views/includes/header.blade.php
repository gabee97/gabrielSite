<nav id="nav-header" class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Bandeiras via CDN -->
    <a href="{{ route('change.language', 'pt_BR') }}" class="nav-link p-1">
        <img src="https://flagcdn.com/w40/br.png" alt="Português" width="24">
    </a>
    <a href="{{ route('change.language', 'en') }}" class="nav-link p-1">
        <img src="https://flagcdn.com/w40/us.png" alt="English" width="24">
    </a>

    <!-- Nome e botão -->
    <a class="navbar-brand" title="@lang('messages.back-home')" href="{{ route('home') }}">
        @lang('messages.gabriel-complete-name')
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav w-100">
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

            <!-- Redes sociais (corrigido para evitar <a> dentro de <a>) -->
            <li class="nav-item ml-lg-auto">
                <a class="nav-link text-white" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://www.instagram.com/oliveiragabee_/" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://wa.me/+5541987694868?text=Olá Gabriel!%0AAchei seu perfil pelo seu site e gostaria de falar contigo" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
