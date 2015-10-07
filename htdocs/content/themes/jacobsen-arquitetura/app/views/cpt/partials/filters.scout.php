    <div class="row--padded projects-filters" data-content-grid-filter-parameter="{{ $filter_parameter }}">
@foreach ($categories as $category)
        <a href="{{ get_term_link($category) }}" class="button button--small button--filter uppercase page-transition--none @if($category->slug == $current_category)button--active @endif"
            data-content-grid-filter="{{ $category->slug }}">{{ $category->name }}</a>
@endforeach
    </div>
