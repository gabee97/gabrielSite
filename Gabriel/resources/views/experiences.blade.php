@include('includes.head')
@include('includes.header')

<main>
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
        <article class="experience-card experience-card-featured">
            <div class="experience-header">
                <div>
                    <h2>@lang('messages.webcontrol_position')</h2>
                    <p>@lang('messages.webcontrol_previous_role')</p>
                </div>
                <span>@lang('messages.webcontrol_period')</span>
            </div>
            <p>@lang('messages.webcontrol_description')</p>
            <h3>@lang('messages.webcontrol_highlights_title')</h3>
            <ul class="experience-bullets">
                <li>@lang('messages.webcontrol_highlight_1')</li>
                <li>@lang('messages.webcontrol_highlight_2')</li>
                <li>@lang('messages.webcontrol_highlight_3')</li>
                <li>@lang('messages.webcontrol_highlight_4')</li>
                <li>@lang('messages.webcontrol_highlight_5')</li>
                <li>@lang('messages.webcontrol_highlight_6')</li>
                <li>@lang('messages.webcontrol_highlight_7')</li>
            </ul>
            <h3>@lang('messages.tech_used')</h3>
            <div class="tech-grid">
                <div><strong>@lang('messages.backend')</strong><p>@lang('messages.webcontrol_tech_backend')</p></div>
                <div><strong>@lang('messages.frameworks')</strong><p>@lang('messages.webcontrol_tech_frameworks')</p></div>
                <div><strong>@lang('messages.integrations')</strong><p>@lang('messages.webcontrol_tech_integrations')</p></div>
                <div><strong>@lang('messages.database')</strong><p>@lang('messages.webcontrol_tech_database')</p></div>
                <div><strong>@lang('messages.versioning')</strong><p>@lang('messages.webcontrol_tech_versioning')</p></div>
                <div><strong>@lang('messages.system_admin')</strong><p>@lang('messages.webcontrol_sysadmin_tasks')</p></div>
            </div>
        </article>

        <article class="experience-card">
            <div class="experience-header">
                <div>
                    <h2>@lang('messages.omnilink_position')</h2>
                </div>
                <span>@lang('messages.omnilink_period')</span>
            </div>
            <p>@lang('messages.omnilink_description')</p>
            <h3>@lang('messages.tech_used')</h3>
            <div class="tech-grid">
                <div><strong>@lang('messages.backend')</strong><p>PHP 7</p></div>
                <div><strong>@lang('messages.frameworks')</strong><p>CodeIgniter, Bootstrap 3</p></div>
                <div><strong>@lang('messages.database')</strong><p>MySQL</p></div>
                <div><strong>@lang('messages.frontend')</strong><p>JavaScript, jQuery, CSS3</p></div>
                <div><strong>@lang('messages.versioning')</strong><p>Git, Bitbucket</p></div>
            </div>
        </article>

        <article class="experience-card">
            <div class="experience-header">
                <div>
                    <h2>@lang('messages.simplifica_position_jr')</h2>
                    <p>@lang('messages.simplifica_position_intern')</p>
                </div>
                <span>@lang('messages.simplifica_period_jr') / @lang('messages.simplifica_period_intern')</span>
            </div>
            <p>@lang('messages.simplifica_description')</p>
            <h3>@lang('messages.tech_used')</h3>
            <div class="tech-grid">
                <div><strong>@lang('messages.backend')</strong><p>PHP 7</p></div>
                <div><strong>@lang('messages.frameworks')</strong><p>CodeIgniter, Bootstrap 3</p></div>
                <div><strong>@lang('messages.database')</strong><p>MySQL</p></div>
                <div><strong>@lang('messages.frontend')</strong><p>JavaScript, jQuery, CSS3</p></div>
                <div><strong>@lang('messages.versioning')</strong><p>Git</p></div>
            </div>
        </article>
    </div>
</section>
</main>

@include('includes.footer')
