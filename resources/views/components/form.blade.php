@props([
    'method' => 'POST',
    'action' => ''
])

<form method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    action="{{ $action }}" {{ $attributes }}
>
{{-- <form method="GET" action={{ route('orders.update', $order->id) }}> --}}
    @csrf

    @if (! in_array($method, ['GET', 'POST', 'PATCH']))
        @method($method)
    @endif

    {{ $slot }}
</form>
