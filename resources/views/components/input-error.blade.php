@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger list-unstyled m-0']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif