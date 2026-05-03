@include('includes.head')
@include('includes.header')

<main>
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="section-kicker">@lang('messages.hero_kicker')</p>
                <h1>@lang('messages.hello')</h1>
                <p class="hero-lead">@lang('messages.intro')</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ route('experiences') }}"><i class="fas fa-briefcase"></i> @lang('messages.experiences')</a>
                    <a class="btn btn-outline-light" href="{{ route('contacts') }}"><i class="fas fa-envelope"></i> @lang('messages.contacts')</a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="profile-frame">
                    <img src="{{ asset('storage/5.jpeg') }}" class="profile-photo" alt="@lang('messages.profile_photo_alt')">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="section-heading text-center">
            <p class="section-kicker">@lang('messages.first_of_all')</p>
            <h2>@lang('messages.about_me')</h2>
            <p>@lang('messages.about_me_description')</p>
            <a class="btn btn-dark" href="{{ route('about') }}"><i class="fas fa-angle-right"></i> @lang('messages.know_more')</a>
        </div>
    </div>
</section>

<section class="site-section section-dark">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <div class="feature-panel h-100">
                    <p class="section-kicker">@lang('messages.not_less_important')</p>
                    <h2>@lang('messages.skills_upper')</h2>
                    <p>@lang('messages.skills_description')</p>
                    <a class="btn btn-outline-light" href="{{ route('skills') }}"><i class="fas fa-code"></i> @lang('messages.know_skills')</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-panel h-100">
                    <p class="section-kicker">@lang('messages.cant_forget')</p>
                    <h2>@lang('messages.experiences_upper')</h2>
                    <p>@lang('messages.experiences_description')</p>
                    <a class="btn btn-outline-light" href="{{ route('experiences') }}"><i class="fas fa-briefcase"></i> @lang('messages.experiences')</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section contact-band">
    <div class="container">
        <div class="contact-card">
            <h2>@lang('messages.send_message')</h2>
            <form class="form-contact" action="{{ route('send.email') }}" method="POST">
                @csrf
                <label for="name">@lang('messages.name')</label>
                <input type="text" name="name" class="form-control" placeholder="@lang('messages.name_placeholder')" id="name" required>
                <label for="email">@lang('messages.email')</label>
                <input type="email" name="email" class="form-control" placeholder="@lang('messages.email_placeholder')" id="email" required>
                <label for="phone">@lang('messages.phone')</label>
                <input type="text" name="phone" class="form-control" placeholder="@lang('messages.phone_placeholder')" id="phone">
                <label for="message">@lang('messages.message')</label>
                <textarea id="message" name="message" class="form-control" placeholder="@lang('messages.message_placeholder')" required></textarea>
                <div class="form-actions">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-envelope"></i> @lang('messages.send_email')</button>
                    <button type="button" onclick="sendWhatsAppMessage(this)" class="btn btn-success" data-message-prefix="@lang('messages.whatsapp_message_prefix')"><i class="fab fa-whatsapp"></i> @lang('messages.send_whatsapp')</button>
                </div>
            </form>
        </div>
    </div>
</section>
</main>

@include('includes.footer')
