<section id="projects" class="site-section">
<div class="container"><h2>@lang('portfolio.projects')</h2>
@foreach(config('portfolio.projects') as $project)
<article class="experience-card mt-4">
<p class="section-kicker">{{ __('portfolio.'.$project['key'].'_status') }}</p>
<h3>{{ $project['name'] }}</h3>
<p>{{ __('portfolio.'.$project['key'].'_description') }}</p>
<p>{{ __('portfolio.'.$project['key'].'_problem') }}</p>
<p>{{ __('portfolio.'.$project['key'].'_solution') }}</p>
<p>{{ __('portfolio.'.$project['key'].'_planned') }}</p>
<p><strong>{{ $project['technologies'] }}</strong></p>
<a class="btn btn-dark" href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer">GitHub · {{ $project['name'] }}</a>
@if(!empty($project['demo']))<a class="btn btn-outline-dark" href="{{ $project['demo'] }}">Demo</a>@endif
</article>
@endforeach
</div></section>
