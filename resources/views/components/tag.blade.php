
@props(['tag', 'size' => 'base'])
@php
    $classes = " bg-white/10 hover:bg-white/25 rounded-xl X transition-colors duration-300 border border-white/10 inline-flex mt-1";

    if ($size === 'base') {
        $classes .= " px-5 py-1 text-sm font-bold";
    }

    if ($size === 'small') {
        $classes .= " px-3 py-1 text-2xs font-medium";
    }

@endphp

<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ ucfirst($tag->name) }}</a>



