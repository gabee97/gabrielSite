<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('messages.title')</title>

    <!-- Meta tags para SEO -->
    <meta name="description" content="@lang('messages.meta_description')">
    <meta name="keywords" content="@lang('messages.meta_keywords')">
    <meta name="author" content="@lang('messages.gabriel-complete-name')">

    <!-- Meta tags para Open Graph (compartilhamento em redes sociais) -->
    <meta property="og:title" content="@lang('messages.og_title')">
    <meta property="og:description" content="@lang('messages.og_description')">
    <meta property="og:image" content="{{ asset('storage/5.jpeg') }}">
    <meta property="og:url" content="https://gbr.dev.br">
    <meta property="og:type" content="website">

    <!-- Meta tags para Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@lang('messages.twitter_title')">
    <meta name="twitter:description" content="@lang('messages.twitter_description')">
    <meta name="twitter:image" content="{{ asset('storage/5.jpeg') }}">

    @include('includes/cdn')
</head>

