<div class="dl dl--projects">
@foreach($dlist as $list)
    <div class="dl__title">
        <h3 class="heading--zeta heading--light uppercase">{{ $list['title'] }}</h3>
    </div>
    <dl class="dl__content">
@foreach($list['content'] as $content)
        <dt class="dl__dt heading--iota heading--light uppercase">{{ $content['name'] }}</dt>
        <dd class="dl__dd heading--iota heading--light lowercase">{{ $content['value'] }}</dd>
@endforeach
    </dl>
@endforeach
</div>
