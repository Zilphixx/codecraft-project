@props(['invalid'])

<input type="checkbox" {!! $attributes->merge(['class' => "form-check-input {$invalid}"]) !!}>