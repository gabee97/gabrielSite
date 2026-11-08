@include('includes.head')
@include('includes.header')
<main id="main-content">
<section class="hero-section"><div class="container"><div class="row align-items-center g-4">
<div class="col-lg-7">
<p class="section-kicker">PHP &amp; Laravel</p><h1>Gabriel Oliveira</h1>
<p class="hero-role">@lang('portfolio.role')</p><p>@lang('portfolio.specialties')</p>
<p class="hero-lead">@lang('portfolio.intro')</p>
<div class="hero-actions">
<a class="btn btn-primary" href="#projects">@lang('portfolio.view_projects')</a>
@php($resumeFilename = 'Gabriel Oliveira de Paula - '.(app()->getLocale() === 'en' ? 'EN' : 'PT').'.pdf')
<a class="btn btn-outline-light" href="{{ asset('files/'.rawurlencode($resumeFilename)) }}" download="{{ $resumeFilename }}"><i class="fas fa-download" aria-hidden="true"></i> @lang('portfolio.resume')</a>
<a class="btn btn-outline-light" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
<a class="btn btn-outline-light" href="https://github.com/gabee97" target="_blank" rel="noopener noreferrer">GitHub</a>
</div></div>
<div class="col-lg-5 text-center"><div class="profile-frame">
<picture class="profile-picture"><source srcset="{{ asset('images/final.webp') }}" type="image/webp"><img src="{{ asset('images/final.jpg') }}" class="profile-photo" alt="@lang('messages.profile_photo_alt')" width="922" height="1152" fetchpriority="high"></picture>
</div></div>
</div></div></section>
<section class="site-section"><div class="container"><h2>@lang('portfolio.skills')</h2>
@include('includes.core-skills')
<a class="btn btn-outline-dark mt-4" href="{{ route('skills') }}">@lang('messages.know_skills')</a>
</div></section>
@include('includes.projects')
<section class="site-section section-dark"><div class="container"><h2>@lang('portfolio.experience')</h2>
<p>@lang('portfolio.experience_summary')</p>
<a class="btn btn-outline-light" href="{{ route('experiences') }}">@lang('messages.experiences')</a>
</div></section>
<section class="site-section"><div class="container"><h2>@lang('portfolio.education')</h2>
<p>@lang('messages.education_degree_details')</p><p>@lang('messages.education_post_details')</p>
<a class="btn btn-outline-dark" href="{{ route('about') }}">@lang('messages.about_title')</a>
</div></section>
<section id="contact" class="site-section contact-band"><div class="container"><div class="contact-card">
<h2>@lang('portfolio.contact')</h2>@include('includes.contact-form')
</div></div></section>
</main>
@include('includes.footer')
