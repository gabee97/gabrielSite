@include('includes.head')
@include('includes.header')

<main>
<section class="page-hero">
    <div class="container">
        <p class="section-kicker">@lang('messages.about')</p>
        <h1>@lang('messages.about_title')</h1>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <div class="content-block">
                    <p>@lang('messages.about_p1')</p>
                    <p>@lang('messages.about_p2')</p>
                    <p>@lang('messages.about_p3')</p>
                    <p>@lang('messages.about_p4')</p>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="profile-frame profile-frame-small">
                    <img src="{{ asset('storage/5.jpeg') }}" class="profile-photo" alt="@lang('messages.profile_photo_alt')">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section section-dark">
    <div class="container">
        <div class="section-heading text-center">
            <p class="section-kicker">@lang('messages.principles_title')</p>
            <h2>@lang('messages.professional_principles')</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <article class="principle-card">
                    <h3>@lang('messages.principle_quality_title')</h3>
                    <p>@lang('messages.principle_quality_text')</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="principle-card">
                    <h3>@lang('messages.principle_innovation_title')</h3>
                    <p>@lang('messages.principle_innovation_text')</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="principle-card">
                    <h3>@lang('messages.principle_teamwork_title')</h3>
                    <p>@lang('messages.principle_teamwork_text')</p>
                </article>
            </div>
        </div>
    </div>
</section>

</main>

@include('includes.footer')
