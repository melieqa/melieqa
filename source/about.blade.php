---
title: About
description: Melieqa Rezaei — architect (BArch, University of Tabriz), architectural storyteller and designer. Skills, education, courses and languages.
---
@extends('_layouts.main')

@php
    $skills = [
        'Advanced' => ['Rhinoceros', 'Adobe Photoshop', 'Adobe Illustrator', 'AutoCAD', 'V-Ray'],
        'Working' => ['Chaos Corona', 'SketchUp'],
        'Familiar' => ['ClimateStudio', 'Adobe InDesign', 'Figma', 'Adobe XD'],
        'Currently learning' => ['Grasshopper', 'Ladybug', 'Honeybee', 'MidJourney', 'Stable Diffusion (ControlNet)', 'Immersity AI'],
        'Collaboration & documentation' => ['Miro', 'Obsidian', 'Microsoft Office', 'Google Docs'],
    ];

    $languages = [
        'Persian' => 'Native',
        'English' => 'Upper-Intermediate',
        'German' => 'Intermediate',
        'Russian' => 'Basic',
        'Turkish' => 'Basic',
    ];

    $courses = [
        'Diagram & Design Communication' => [
            ['title' => 'Coronagraph', 'note' => 'Corona Renderer for Architectural Diagram', 'org' => 'Palette Academy', 'when' => 'Fall 2025 · In Progress', 'extra' => null, 'link' => null],
            ['title' => 'Architectural Diagram Course', 'note' => null, 'org' => 'Palette Academy', 'when' => 'Spring 2025', 'extra' => 'Ranked 1st among students of the 19th cohort', 'link' => null],
        ],
        'Visualisation & Modelling' => [
            ['title' => 'Storytelling in Architecture with AI', 'note' => null, 'org' => 'Kaveh Dadgar', 'when' => '2026 · In Progress', 'extra' => null, 'link' => null],
            ['title' => 'Rhinoceros', 'note' => '3D Modeling in Architecture', 'org' => 'Palette Academy', 'when' => 'Summer 2025', 'extra' => 'Ranked 1st among students of the 19th cohort', 'link' => null],
        ],
        'Design Thinking & Research' => [
            ['title' => 'Creativity in the Design Process', 'note' => null, 'org' => 'LMIMOS, with Hossein Elmi Mousavi', 'when' => '2026 · In Progress', 'extra' => null, 'link' => null],
            ['title' => 'Product Design: The Delft Design Approach', 'note' => null, 'org' => 'DelftX (Delft University of Technology) on edX', 'when' => 'Fall 2023', 'extra' => 'Certificate', 'link' => 'https://courses.edx.org/certificates/7705b75b7c8b46fd82ef8ee0685524d1'],
            ['title' => 'Human-Centered Design Camp', 'note' => null, 'org' => 'with Benyamin Najafi, Senior Product Designer', 'when' => 'Summer 2023', 'extra' => null, 'link' => null],
        ],
        'Digital & Interface' => [
            ['title' => 'UI & UX Design', 'note' => null, 'org' => 'Inverse Academy', 'when' => '2025 · In Progress', 'extra' => null, 'link' => null],
            ['title' => 'Introduction to Computer Science', 'note' => null, 'org' => 'CS50x Iran (CS50 Harvard University) on edX', 'when' => '2021', 'extra' => 'Certificate', 'link' => 'https://certificates.cs50.io/7ec94e0f-0400-4476-a6f0-49ca22171d26.pdf?size=letter'],
            ['title' => 'User Interface Design & User Experience Design', 'note' => null, 'org' => 'DUXLab Academy · Hooman Abbasi', 'when' => '2021', 'extra' => 'Certificate', 'link' => null],
        ],
        'Personal Development' => [
            ['title' => 'German Intensive Course', 'note' => 'A1 – B1 · 9 hours weekly, approx. 400 hours', 'org' => 'Mahan Institute, Mashhad, Khorasan Razavi, Iran', 'when' => 'Sep. 2023 – Sep. 2024', 'extra' => null, 'link' => null],
        ],
    ];
@endphp

@section('body')
    {{-- Intro --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        <div class="flex flex-col md:flex-row gap-10 md:gap-14">
            <div class="w-44 sm:w-52 md:w-64 shrink-0">
                @include('_components.placeholder-image', [
                    'image' => null,
                    'label' => 'Portrait',
                    'alt' => 'Melieqa Rezaei',
                    'ratio' => 'aspect-[4/5]',
                ])
            </div>

            <div class="flex-1 max-w-3xl">
                <h1 class="text-3xl md:text-5xl font-bold tracking-tight text-paper-bright my-0">About</h1>

                <p class="font-hand text-xl md:text-2xl text-paper-dim mt-2 mb-8">Who I am, and where it came from</p>

                <div class="flex flex-col gap-5 text-base md:text-lg">
                    <p class="my-0">
                        I am an architect (BArch, University of Tabriz) who cares as much about the story behind a
                        design as the design itself. A space isn't just walls and function, it is the thoughts and
                        feelings that shaped it, and my work is making that visible.
                    </p>

                    <p class="my-0">
                        Projects usually reach me when the idea is already good but illegible: it lives in the
                        architect's head and dies somewhere between the plan and the board. My job is to find the
                        argument inside the project and give it a structure a jury or a client can follow in seconds,
                        design that works, but also speaks.
                    </p>

                    <p class="font-hand text-xl md:text-2xl text-paper-bright my-0 pt-2">
                        What I enjoy most is making the design process feel alive, not just the final result.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Experience --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => "What I've been working on", 'kicker' => 'Experience'])

        @include('_components.timeline')
    </section>

    {{-- Skills --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'What I use', 'kicker' => 'Tools of the trade'])

        <div class="space-y-8">
            @foreach ($skills as $level => $tools)
                <div>
                    <h3 class="text-base md:text-lg font-semibold text-paper-bright mt-0 mb-3">{{ $level }}</h3>

                    <ul class="list-none flex flex-wrap gap-2 md:gap-3 my-0 pl-0">
                        @foreach ($tools as $tool)
                            <li class="pill">{{ $tool }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Education --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'Where it came from', 'kicker' => 'Education'])

        <div class="flex flex-col md:flex-row gap-6 md:gap-12">
            <div class="md:w-1/3">
                <h3 class="text-xl md:text-2xl font-semibold text-paper-bright mt-0 mb-2">BArch, Architecture</h3>
                <p class="text-paper my-0">University of Tabriz</p>
                <p class="text-paper-dim text-sm my-0">2018 – 2022</p>
                <p class="text-sm mt-3 mb-0"><span class="text-paper-dim">Final grade</span> 17.13 out of 20</p>
            </div>

            <div class="md:w-2/3 md:border-l md:border-dashed md:border-line md:pl-12 text-base">
                <p class="my-0">
                    I graduated with a <a href="/work/cardiac-hospital" title="Cardiac Hospital thesis" class="link-underline">cardiac hospital</a>
                    designed around the patient's path to critical care.
                </p>

                <p class="mt-4 mb-0">
                    Somewhere in defending it I realised I was more interested in how a design gets understood than in
                    how it gets detailed, which is more or less the job I do now.
                </p>
            </div>
        </div>
    </section>

    {{-- Courses --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'What I keep learning', 'kicker' => 'Courses and certifications'])

        <div class="space-y-12">
            @foreach ($courses as $group => $items)
                <div>
                    <h3 class="text-lg md:text-xl font-semibold tracking-wide text-paper-bright mt-0 mb-5">{{ $group }}</h3>

                    <ul class="list-none my-0 pl-0 space-y-5">
                        @foreach ($items as $course)
                            <li class="flex flex-col md:flex-row md:items-baseline md:justify-between gap-1 md:gap-8 border-b border-dashed border-line pb-5 last:border-b-0 last:pb-0">
                                <div class="md:flex-1">
                                    <p class="font-medium text-paper-bright my-0">{{ $course['title'] }}</p>

                                    @if ($course['note'])
                                        <p class="text-sm text-paper-dim my-0">{{ $course['note'] }}</p>
                                    @endif

                                    <p class="text-sm text-paper my-0">{{ $course['org'] }}</p>
                                </div>

                                <div class="md:text-right shrink-0">
                                    <p class="text-sm text-paper-dim my-0">{{ $course['when'] }}</p>

                                    @if ($course['extra'])
                                        <p class="text-sm my-0">
                                            @if ($course['link'])
                                                <a href="{{ $course['link'] }}" title="{{ $course['title'] }} certificate" rel="noopener" class="link-underline">{{ $course['extra'] }}</a>
                                            @else
                                                <span class="text-paper">{{ $course['extra'] }}</span>
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Languages --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'What I speak', 'kicker' => 'Languages'])

        <ul class="list-none flex flex-wrap gap-2 md:gap-3 my-0 pl-0">
            @foreach ($languages as $language => $level)
                <li class="pill">
                    <span class="text-paper-bright font-medium">{{ $language }}</span>
                    <span class="text-paper-dim ml-2">· {{ $level }}</span>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- Off the clock --}}
    <section class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 rule-dashed">
        @include('_components.section-heading', ['heading' => 'Off the clock', 'kicker' => 'Beyond the studio'])

        <div class="flex flex-col md:flex-row gap-8 md:gap-12">
            <p class="md:w-1/3 text-lg md:text-xl font-medium text-paper-bright my-0">
                The same curiosity about people, applied outside the studio.
            </p>

            <div class="md:w-2/3 flex flex-col gap-5 text-base">
                <p class="my-0">
                    <span class="font-semibold text-paper-bright">Five years of volunteering</span>
                    · weekly cleanups with Tamozi NGO, stationery kits for children in rural Kurdistan, a fundraising
                    bazaar for the blind community in Mashhad, and outreach for the Iranian Society of Organ Donation.
                </p>

                <p class="my-0">
                    <span class="font-semibold text-paper-bright">A month on the road</span>
                    · travelling across Iran with a camera, photographing architectural details, corners, and random
                    strangers along the way.
                </p>

                <p class="my-0">
                    <span class="font-semibold text-paper-bright">How people work</span>
                    · an ongoing interest in how people think and relate to each other, and another lens for
                    understanding who the spaces I design are actually for.
                </p>
            </div>
        </div>
    </section>
@endsection
