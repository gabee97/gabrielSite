@include('includes.head')
@include('includes.header')
<main id="main-content" class="resume">
<section class="site-section"><div class="container">
<button class="btn btn-dark print-action" onclick="window.print()">@lang('portfolio.print')</button>
<h1>Gabriel Oliveira de Paula</h1><h2>@lang('portfolio.role')</h2><p>@lang('portfolio.intro')</p>
<p><a href="https://github.com/gabee97">github.com/gabee97</a> · <a href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/">LinkedIn</a> · <a href="{{ route('contacts') }}">@lang('messages.contacts')</a></p>
<h2>@lang('portfolio.skills')</h2>@include('includes.core-skills')
<h2 class="mt-4">@lang('messages.experience_title')</h2>
<div class="experience-list">@include('includes.experience-list')</div>
<h2 class="mt-4">@lang('portfolio.education')</h2>
<p>@lang('messages.education_degree_details')</p><p>@lang('messages.education_post_details')</p>
<h2>@lang('messages.languages_title')</h2><p>@lang('messages.language_english') · @lang('messages.language_spanish') · @lang('messages.language_french')</p>
</div></section></main>
@include('includes.footer')
