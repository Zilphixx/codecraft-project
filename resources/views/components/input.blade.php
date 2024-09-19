@props(['invalid'])

<input {!! $attributes->merge(['class' => "form-control {$invalid}"]) !!}>