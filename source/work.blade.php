---
title: Work
description: Selected architectural projects, diagrams, visualisation and 3D modelling by Melieqa Rezaei.
---
@extends('_layouts.main')

@section('body')
    <div class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        @include('_components.section-heading', ['heading' => 'Work', 'kicker' => 'Projects, diagrams and collaborations'])

        <p class="max-w-3xl text-base md:text-lg text-paper mb-12">
            Projects usually reach me when the idea is already good but illegible. What follows is the work of making
            that idea readable: analytical diagrams, visualisation, 3D modelling, and research-based design.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach ($projects as $project)
                @include('_components.project-card', ['project' => $project])
            @endforeach
        </div>
    </div>
@stop
