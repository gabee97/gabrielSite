<h1>@lang('messages.contact_email_title')</h1>

<p><strong>@lang('messages.name')</strong> {{ $name }}</p>
<p><strong>@lang('messages.email')</strong> {{ $email }}</p>
@if(!empty($phone))
    <p><strong>@lang('messages.phone')</strong> {{ $phone }}</p>
@endif

<p><strong>@lang('messages.message')</strong></p>
<p>{{ $message }}</p>
