@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <article class="container max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        @if ($page->cover_image)
            <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="w-full mb-10">
        @endif

        <h1 class="text-3xl md:text-5xl font-bold tracking-tight leading-tight text-paper-bright mt-0 mb-4">{{ $page->title }}</h1>

        <p class="text-sm text-paper-dim my-0">
            {{ $page->author }} &middot; {{ date('F j, Y', $page->date) }}
        </p>

        @if ($page->categories)
            <div class="flex flex-wrap gap-2 mt-5">
                @foreach ($page->categories as $category)
                    <a
                        href="{{ '/blog/categories/' . $category }}"
                        title="View posts in {{ $category }}"
                        class="pill hover:border-paper-dim transition-colors text-xs uppercase tracking-wide"
                    >{{ $category }}</a>
                @endforeach
            </div>
        @endif

        <div class="border-b border-dashed border-line mt-10 mb-10 pb-10" v-pre>
            @yield('content')
        </div>

        <nav class="flex justify-between gap-6 text-sm">
            <div>
                @if ($next = $page->getNext())
                    <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}" class="link-underline">
                        &LeftArrow; {{ $next->title }}
                    </a>
                @endif
            </div>

            <div class="text-right">
                @if ($previous = $page->getPrevious())
                    <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}" class="link-underline">
                        {{ $previous->title }} &RightArrow;
                    </a>
                @endif
            </div>
        </nav>
    </article>
@endsection
