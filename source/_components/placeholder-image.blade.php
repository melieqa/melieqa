{{-- Renders a real image when one is supplied, otherwise a labelled drop-zone.
     Usage: @include('_components.placeholder-image', ['image' => $project->image, 'label' => $project->title, 'ratio' => 'aspect-[4/3]']) --}}

@php
    $placeholderRatio = $ratio ?? 'aspect-[4/3]';
    $placeholderLabel = $label ?? 'Image';
    $placeholderAlt = $alt ?? $placeholderLabel;
@endphp

@if (! empty($image))
    <img
        src="{{ $image }}"
        alt="{{ $placeholderAlt }}"
        loading="lazy"
        class="w-full h-full {{ $placeholderRatio }} object-cover bg-ink-soft"
    >
@else
    <div
        class="w-full {{ $placeholderRatio }} bg-ink-soft border border-dashed border-line flex flex-col items-center justify-center text-center gap-2 px-4"
        role="img"
        aria-label="Placeholder for {{ $placeholderAlt }}"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 stroke-current text-line" fill="none" viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true">
            <rect x="3" y="4" width="18" height="16" rx="1.5" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16l5-5 4 4 3-3 6 6" />
            <circle cx="8.5" cy="9" r="1.25" />
        </svg>

        <span class="font-hand text-lg md:text-xl text-paper-dim leading-tight">{{ $placeholderLabel }}</span>

        <span class="text-[10px] uppercase tracking-[0.2em] text-line">Add image</span>
    </div>
@endif
