@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <article class="container max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        <a href="/work" title="Back to all work" class="text-sm text-paper-dim hover:text-paper-bright transition-colors">
            &LeftArrow; All work
        </a>

        <header class="mt-8 mb-10">
            <p class="text-xs uppercase tracking-[0.18em] text-paper-dim my-0">{{ $page->kind }}</p>

            <h1 class="text-3xl md:text-5xl font-bold tracking-tight text-paper-bright mt-3 mb-2">{{ $page->title }}</h1>

            <p class="text-base md:text-lg text-paper my-0">{{ $page->meta }}</p>

            @if ($page->role || $page->tools)
                <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 text-sm mt-6 max-w-lg">
                    @if ($page->role)
                        <dt class="text-paper-dim">Role:</dt>
                        <dd class="my-0">{{ $page->role }}</dd>
                    @endif

                    @if ($page->tools)
                        <dt class="text-paper-dim">Tools:</dt>
                        <dd class="my-0">{{ implode(', ', $page->tools) }}</dd>
                    @endif
                </dl>
            @endif
        </header>

        <div class="mb-10">
            @include('_components.placeholder-image', [
                'image' => $page->image,
                'label' => $page->title . ' — hero image',
                'alt' => $page->title,
                'ratio' => 'aspect-[16/9]',
            ])
        </div>

        <div class="max-w-3xl" v-pre>
            @yield('content')
        </div>

        {{-- Gallery: swap the placeholders for real boards as they are ready --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-14">
            @foreach (($page->gallery ?? [null, null]) as $index => $galleryImage)
                @include('_components.placeholder-image', [
                    'image' => $galleryImage,
                    'label' => $page->title . ' — board ' . ($index + 1),
                    'alt' => $page->title . ' board ' . ($index + 1),
                    'ratio' => 'aspect-[4/3]',
                ])
            @endforeach
        </div>

        <nav class="flex justify-between gap-6 text-sm mt-16 pt-8 rule-dashed">
            <div>
                @if ($previous = $page->getPrevious())
                    <a href="{{ $previous->getUrl() }}" title="Previous project: {{ $previous->title }}" class="link-underline">
                        &LeftArrow; {{ $previous->title }}
                    </a>
                @endif
            </div>

            <div class="text-right">
                @if ($next = $page->getNext())
                    <a href="{{ $next->getUrl() }}" title="Next project: {{ $next->title }}" class="link-underline">
                        {{ $next->title }} &RightArrow;
                    </a>
                @endif
            </div>
        </nav>
    </article>
@endsection
