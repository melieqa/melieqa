---
title: Contact
description: Get in touch with Melieqa Rezaei — architectural storyteller and designer.
---
@extends('_layouts.main')

@section('body')
    <div class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        @include('_components.section-heading', ['heading' => 'Contact', 'kicker' => "Click here and let's collaborate!"])

        <div class="flex flex-col md:flex-row gap-10 md:gap-16">
            <div class="md:w-1/2 max-w-lg">
                <p class="text-base md:text-lg my-0">
                    Diagrams, visualisation, 3D modelling, or a whole project narrative — from a first concept
                    diagram to a final delivered set. Tell me what the project is trying to say and where it is
                    getting stuck.
                </p>

                <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 text-sm md:text-base mt-10">
                    <dt class="text-paper-dim">E-mail:</dt>
                    <dd class="my-0"><a class="link-underline" href="mailto:{{ $page->email }}">{{ $page->email }}</a></dd>

                    <dt class="text-paper-dim">Tel.:</dt>
                    <dd class="my-0"><a class="link-underline" href="tel:{{ $page->phoneLink }}">{{ $page->phone }}</a></dd>

                    <dt class="text-paper-dim">Social:</dt>
                    <dd class="my-0 text-paper">{{ $page->social }}</dd>
                </dl>
            </div>
        </div>
    </div>
@stop
