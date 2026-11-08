@include('includes.head')
@include('includes.header')

<main id="main-content">
<section class="page-hero">
    <div class="container">
        <p class="section-kicker">@lang('messages.experiences')</p>
        <h1>@lang('messages.experience_title')</h1>
        <p>@lang('messages.experience_intro_1')</p>
        <p>@lang('messages.experience_intro_2')</p>
    </div>
</section>

<section class="site-section">
    <div class="container experience-list">
        @include('includes.experience-list')
    </div>
</section>
</main>

@include('includes.footer')
