<?php $classes = isset($classes) && is_array($classes) ? implode(' ', $classes) : ''; ?>
<div class="dl {{ $classes }}">
@foreach($dlist as $list)
@if(isset($list['title']))
    <div class="dl__title">
        <h3 class="heading--zeta heading--light uppercase">{{ $list['title'] }}</h3>
    </div>
@endif
    <dl class="dl__content">
@if (is_array($list['content']))
@foreach($list['content'] as $content)
        <dt class="dl__dt heading--iota heading--light uppercase"><span>{{ $content['name'] }}</span></dt>
        <dd class="dl__dd heading--iota heading--light lowercase"><span>{{ $content['value'] }}</span></dd>
@endforeach
@endif
    </dl>
@endforeach
</div>
