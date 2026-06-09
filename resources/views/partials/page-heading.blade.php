@include('partials.page-heading-styles')

<div class="breadcrumb-wrapper page-heading-bar fix">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $title }}</h1>
            </div>
            @if (! empty($items))
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    @foreach ($items as $item)
                        @if (! empty($item['url']))
                            <li><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
                        @else
                            <li class="style-2 style-3">{{ $item['label'] }}</li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
