<div class="row g-3">
@foreach(['backend' => 'Backend', 'frontend' => 'Frontend', 'database' => __('messages.database_title'), 'infrastructure' => __('portfolio.infrastructure_title')] as $key => $label)
<div class="col-md-6"><article class="skill-section h-100"><h3>{{ $label }}</h3><p>{{ __('portfolio.'.$key) }}</p></article></div>
@endforeach
</div>
