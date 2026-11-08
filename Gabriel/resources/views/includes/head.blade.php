<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $page = request()->route()->getName();
        $title = __('portfolio.'.$page.'_title');
        $description = __('portfolio.'.$page.'_description');
        $base = rtrim(config('portfolio.url'), '/');
        $canonical = $base.route($page, ['locale' => request()->route('locale')], false);
        $image = $base.'/images/final.jpg';
    @endphp
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="author" content="@lang('messages.gabriel-complete-name')">
    <link rel="canonical" href="{{ $canonical }}">
    @foreach(['pt' => 'pt-BR', 'en' => 'en'] as $locale => $language)
    <link rel="alternate" hreflang="{{ $language }}" href="{{ $base.route($page, ['locale' => $locale], false) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ $base.route($page, ['locale' => 'pt'], false) }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:image:width" content="922">
    <meta property="og:image:height" content="1152">
    <meta property="og:image:alt" content="@lang('messages.profile_photo_alt')">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'pt_BR' }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $image }}">
    <meta name="twitter:image:alt" content="@lang('messages.profile_photo_alt')">
    <script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@graph' => [
        ['@type' => 'Person', '@id' => $base.'/#person', 'name' => __('messages.gabriel-complete-name'), 'url' => $base, 'image' => $image, 'jobTitle' => __('portfolio.role'), 'sameAs' => ['https://github.com/gabee97', 'https://www.linkedin.com/in/gabriel-oliveira-gop1997/']],
        ['@type' => 'WebSite', '@id' => $base.'/#website', 'url' => $base, 'name' => 'Gabriel Oliveira', 'inLanguage' => ['pt-BR', 'en']]
    ]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    @include('includes.cdn')
</head>
<body>
<a class="skip-link" href="#main-content">@lang('portfolio.skip')</a>
