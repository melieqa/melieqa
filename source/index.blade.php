---
description: Melieqa Rezaei is an architect and architectural storyteller. I help architecture become understandable.
---
@extends('_layouts.main')

@section('body')
    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="relative container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 pt-16 md:pt-24 pb-16">
            <div class="flex flex-col md:flex-row md:items-end gap-10 md:gap-14">
                <div class="relative w-48 sm:w-56 md:w-64 shrink-0">
                    {{-- The vertical Klein-blue band running behind the portrait, as on the CV cover --}}
                    <div
                        class="absolute -top-10 md:-top-16 left-8 sm:left-10 w-14 sm:w-16 md:w-20 h-[130%] bg-klein -z-10"
                        aria-hidden="true"
                    ></div>

                    @include('_components.placeholder-image', [
                        'image' => null,
                        'label' => 'Portrait',
                        'alt' => 'Melieqa Rezaei',
                        'ratio' => 'aspect-[4/5]',
                    ])
                </div>

                <div class="flex-1">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-paper-bright my-0">
                        {{ $page->siteName }}
                    </h1>

                    <p class="text-lg sm:text-xl lg:text-2xl font-medium text-paper mt-3 mb-1">{{ $page->tagline }}</p>

                    <p class="text-sm sm:text-base text-paper-dim my-0">{{ $page->statement }}</p>

                    <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 text-sm mt-8 max-w-md">
                        <dt class="text-paper-dim">Portfolio:</dt>
                        <dd class="my-0"><a class="link-underline font-semibold" href="{{ $page->baseUrl }}">Melieqa.com</a></dd>

                        <dt class="text-paper-dim">E-mail:</dt>
                        <dd class="my-0"><a class="link-underline tracking-wide" href="mailto:{{ $page->email }}">{{ $page->email }}</a></dd>

                        <dt class="text-paper-dim">Tel.:</dt>
                        <dd class="my-0"><a class="link-underline" href="tel:{{ $page->phoneLink }}">{{ $page->phone }}</a></dd>
                    </dl>

                    <p class="font-hand text-xl md:text-2xl text-paper-bright mt-6 mb-0">
                        Click here and let's collaborate!
                    </p>

                    <p class="font-hand text-lg text-paper-dim mt-1 mb-0">
                        You can also find me on social media with
                        <span class="text-paper-bright">{{ $page->social }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Who I am --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'Who I am', 'kicker' => 'The short version'])

        <div class="max-w-3xl flex flex-col gap-5 text-base md:text-lg">
            <p class="my-0">
                I am an architect (BArch, University of Tabriz) who cares as much about the story behind a design
                as the design itself. A space isn't just walls and function, it is the thoughts and feelings that
                shaped it, and my work is making that visible.
            </p>

            <p class="my-0">
                Projects usually reach me when the idea is already good but illegible: it lives in the architect's
                head and dies somewhere between the plan and the board. My job is to find the argument inside the
                project and give it a structure a jury or a client can follow in seconds, design that works, but
                also speaks.
            </p>

            <p class="font-hand text-xl md:text-2xl text-paper-bright my-0 pt-2">
                What I enjoy most is making the design process feel alive, not just the final result.
            </p>
        </div>
    </section>

    {{-- Selected work --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        <div class="flex flex-wrap items-end justify-between gap-4 mb-8 md:mb-12">
            <div>
                <h2 class="section-title my-0">Selected work</h2>
                <p class="section-kicker my-0 md:ml-16">A few things worth showing</p>
            </div>

            <a href="/work" title="All work" class="link-underline text-sm shrink-0">All work &RightArrow;</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($projects->take(3) as $project)
                @include('_components.project-card', ['project' => $project])
            @endforeach
        </div>
    </section>

    {{-- Timeline --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => "What I've been working on", 'kicker' => '2020 — 2026'])

        @include('_components.timeline')
    </section>

    {{-- Latest writing --}}
    @if ($posts->count())
        <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
            <div class="flex flex-wrap items-end justify-between gap-4 mb-8 md:mb-12">
                <div>
                    <h2 class="section-title my-0">Writing</h2>
                    <p class="section-kicker my-0 md:ml-16">Notes from the desk</p>
                </div>

                <a href="/blog" title="All posts" class="link-underline text-sm shrink-0">All posts &RightArrow;</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                @foreach ($posts->take(2) as $post)
                    @include('_components.post-preview-inline')
                @endforeach
            </div>
        </section>
    @endif

    {{-- Contact CTA --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <h2 class="section-title my-0">Let's collaborate</h2>
                <p class="section-kicker my-0 md:ml-16">Diagrams, visuals, 3D, or a whole narrative</p>
            </div>

            <a
                href="/contact"
                title="Contact {{ $page->siteName }}"
                class="inline-flex items-center justify-center bg-klein hover:bg-klein-bright text-paper-bright text-sm font-medium tracking-wide uppercase rounded-md px-8 py-4 transition-colors shrink-0"
            >Get in touch</a>
        </div>
    </section>
@stop
