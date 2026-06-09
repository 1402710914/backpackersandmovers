@props(['class' => '', 'compact' => false])

<div {{ $attributes->merge(['class' => 'tour-pickup-notice'.($compact ? ' tour-pickup-notice--compact' : '').' '.$class]) }} role="note">
    <i class="fa-solid fa-bus" aria-hidden="true"></i>
    <span>
        @if ($compact)
            <strong>Pickup:</strong> {{ tour_pickup_locations_label() }} only
        @else
            <strong>Pickup locations:</strong> All tours depart from <strong>{{ tour_pickup_locations_label() }}</strong> only — no other pickup cities.
        @endif
    </span>
</div>
