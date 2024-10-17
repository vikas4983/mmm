@php
    $alertTypes = ['success', 'error', 'info', 'warning'];
@endphp

@foreach ($alertTypes as $alertType)
    @if (session()->has($alertType))
        @switch($alertType)
            @case('success')
                <div class="alert alert-success" role="alert">
                    {{ session($alertType) }}
                </div>
            @break

            @case('info')
                <div class="alert alert-info" role="alert">
                    {{ session($alertType) }}
                </div>
            @break

            @case('warning')
                <div class="alert alert-warning" role="alert">
                    {{ session($alertType) }}
                </div>
            @break

            @default
                <div class="alert alert-danger" role="alert">
                    {{ session($alertType) }}
                </div>
        @endswitch
    @endif
@endforeach
