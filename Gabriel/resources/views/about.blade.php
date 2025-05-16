@include('includes.head')
@include('includes.header')

<div class="row row-division row-division-2">
    <div class="col-md-7 text-center">
        <h4 class="text-uppercase small-space">@lang('messages.about_title')</h4>
        <p>@lang('messages.about_p1')</p>
        <p>@lang('messages.about_p2')</p>
        <p>@lang('messages.about_p3')</p>
        <p>@lang('messages.about_p4')</p>
    </div>
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/code-pc.jpg') }}" class="rounded-circle image-index" alt="@lang('messages.image_code_alt')">
    </div>
</div>

<div class="row row-division text-white bg-dark align-items-center">
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/it-pc.jpg') }}" class="rounded-circle image-index" alt="@lang('messages.image_pc_alt')">
    </div>
    <div class="col-md-7">
        <h4 class="text-uppercase small-space text-center">@lang('messages.principles_title')</h4>

        <p class="light-strong text-uppercase">@lang('messages.principle_quality_title')</p>
        <p class="topic">@lang('messages.principle_quality_text')</p>

        <p class="light-strong text-uppercase">@lang('messages.principle_innovation_title')</p>
        <p class="topic">@lang('messages.principle_innovation_text')</p>

        <p class="light-strong text-uppercase">@lang('messages.principle_teamwork_title')</p>
        <p class="topic">@lang('messages.principle_teamwork_text')</p>
    </div>
</div>

@include('includes.footer')
