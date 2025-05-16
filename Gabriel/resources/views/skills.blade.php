@include('includes.head')
@include('includes.header')

<div class="container">
    <div class="mt-4 p-5 bg-dark text-white rounded">
        <h1 class="text-uppercase">@lang('messages.skills_title')</h1>
        <p>@lang('messages.skills_intro')</p>
    </div>

    <section id="education" class="skill-section">
        <h2>@lang('messages.education_title')</h2>
        <p><strong>@lang('messages.education_degree')</strong> @lang('messages.education_degree_details')</p>
        <p><strong>@lang('messages.education_post')</strong> @lang('messages.education_post_details')</p>
    </section>

    <section id="skills" class="bg-dark text-white skill-section">
        <h3>@lang('messages.main_skills_title')</h3>
        <p><strong>@lang('messages.main_skills_stack')</strong> @lang('messages.main_skills_description')</p>

        <h4>@lang('messages.backend_title')</h4>
        <ul>
            <li>@lang('messages.backend_list_1')</li>
            <li>@lang('messages.backend_list_2')</li>
        </ul>

        <h4>@lang('messages.devops_title')</h4>
        <ul>
            <li>@lang('messages.devops_list_1')</li>
            <li>@lang('messages.devops_list_2')</li>
            <li>@lang('messages.devops_list_3')</li>
        </ul>
    </section>

    <section id="skills" class="skill-section">
        <h4>@lang('messages.frontend_title')</h4>
        <ul>
            <li>JavaScript</li>
            <li>jQuery</li>
            <li>CSS 3</li>
            <li>Bootstrap</li>
            <li>Node JS</li>
        </ul>

        <h4>@lang('messages.editor_title')</h4>
        <ul>
            <li>Visual Studio Code</li>
        </ul>

        <h4>@lang('messages.markup_title')</h4>
        <ul>
            <li>HTML 5</li>
        </ul>

        <h4>@lang('messages.ide_title')</h4>
        <ul>
            <li>Eclipse, Spring Tools 4, NetBeans</li>
        </ul>
    </section>

    <section id="skills" class="bg-dark text-white skill-section">
        <h4>@lang('messages.database_title')</h4>
        <ul>
            <li>MySQL</li>
            <li>Microsoft SQL Server</li>
            <li>PostgreSQL</li>
        </ul>

        <h4>@lang('messages.version_control_title')</h4>
        <ul>
            <li>Git</li>
            <li>GitLab</li>
            <li>Bitbucket</li>
            <li>Sourcetree</li>
            <li>TortoiseSVN</li>
        </ul>

        <h4>@lang('messages.api_testing_title')</h4>
        <ul>
            <li>Postman</li>
        </ul>

        <h4>@lang('messages.agile_title')</h4>
        <ul>
            <li>Scrum</li>
            <li>@lang('messages.agile_tools')</li>
        </ul>
    </section>

    <section id="languages" class="skill-section">
        <h2>@lang('messages.languages_title')</h2>
        <ul>
            <li>@lang('messages.language_english')</li>
            <li>@lang('messages.language_spanish')</li>
            <li>@lang('messages.language_french')</li>
        </ul>
    </section>
</div>

@include('includes.footer')
