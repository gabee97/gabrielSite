{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach(['home', 'skills', 'experiences', 'about', 'contacts', 'resume'] as $page)
@foreach(['pt', 'en'] as $locale)
<url><loc>{{ rtrim(config('portfolio.url'), '/').route($page, ['locale' => $locale], false) }}</loc>
@foreach(['pt' => 'pt-BR', 'en' => 'en', 'default' => 'x-default'] as $alternate => $language)
<xhtml:link rel="alternate" hreflang="{{ $language }}" href="{{ rtrim(config('portfolio.url'), '/').route($page, ['locale' => $alternate === 'default' ? 'pt' : $alternate], false) }}" />
@endforeach
</url>
@endforeach
@endforeach
</urlset>
