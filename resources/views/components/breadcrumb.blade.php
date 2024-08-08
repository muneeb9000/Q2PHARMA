<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style2 mb-0">
        @foreach($items as $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">
                        <i class="{{ $item['icon'] }} me-1 fs-15"></i>{{ $item['name'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
