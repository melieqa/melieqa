---
title: Blog
description: Notes on diagrams, architectural storytelling and the design process, by Melieqa Rezaei.
pagination:
    collection: posts
    perPage: 6
---
@extends('_layouts.main')

@section('body')
    <div class="container max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        @include('_components.section-heading', ['heading' => 'Blog', 'kicker' => 'Notes from the desk'])

        <div class="space-y-10">
            @foreach ($pagination->items as $post)
                @include('_components.post-preview-inline')

                @if ($post != $pagination->items->last())
                    <hr class="my-10">
                @endif
            @endforeach
        </div>

        @if ($pagination->pages->count() > 1)
            <nav class="flex flex-wrap gap-3 text-sm mt-14" aria-label="Pagination">
                @if ($previous = $pagination->previous)
                    <a
                        href="{{ $previous }}"
                        title="Previous Page"
                        class="border border-line hover:border-paper-dim rounded-md px-4 py-2 transition-colors"
                    >&LeftArrow;</a>
                @endif

                @foreach ($pagination->pages as $pageNumber => $path)
                    <a
                        href="{{ $path }}"
                        title="Go to Page {{ $pageNumber }}"
                        class="border rounded-md px-4 py-2 transition-colors {{ $pagination->currentPage == $pageNumber ? 'border-klein-bright text-paper-bright' : 'border-line text-paper-dim hover:border-paper-dim hover:text-paper' }}"
                    >{{ $pageNumber }}</a>
                @endforeach

                @if ($next = $pagination->next)
                    <a
                        href="{{ $next }}"
                        title="Next Page"
                        class="border border-line hover:border-paper-dim rounded-md px-4 py-2 transition-colors"
                    >&RightArrow;</a>
                @endif
            </nav>
        @endif
    </div>
@stop
