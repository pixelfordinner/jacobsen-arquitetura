    <div class="row--padded projects-filters" data-content-grid-filter-parameter="{{ $filter_parameter }}">
@foreach ($categories as $category)
        <a href="{{ get_term_link($category) }}" class="button button--small button--filter uppercase page-transition--none @if(in_array($category->slug, $current_category))button--active @endif"
            data-content-grid-filter="{{ $category->slug }}"
<?php
    $category_data = json_decode($category->description);
?>
@if (!is_null($category_data))
@foreach($category_data as $data_key => $data_value)
            data-content-grid-filter-{{ $data_key }}="{{ $data_value }}"
@endforeach
@endif
            >{{ $category->name }}</a>
@endforeach
    </div>
