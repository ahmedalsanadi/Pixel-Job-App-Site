@props(['method' => 'GET'])

<form {{ $attributes->merge(['class' => 'max-w-2xl mx-auto flex flex-col gap-6', 'method' => $method === 'GET' ? 'GET' : 'POST']) }}>
    @if ($method !== 'GET')
        @csrf
        @method($method) <!-- This will be either POST, PUT, PATCH, or DELETE -->
    @endif
    {{ $slot }}
</form>
