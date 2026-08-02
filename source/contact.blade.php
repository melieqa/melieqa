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

                    <dt class="text-paper-dim">Portfolio:</dt>
                    <dd class="my-0"><a class="link-underline" href="{{ $page->baseUrl }}">Melieqa.com</a></dd>

                    <dt class="text-paper-dim">Social:</dt>
                    <dd class="my-0 text-paper">{{ $page->social }}</dd>
                </dl>

                <p class="font-hand text-xl text-paper-dim mt-10 mb-0">
                    You can also find me on social media with
                    <span class="text-paper-bright">{{ $page->social }}</span>
                </p>
            </div>

            {{-- Static sites can't process form posts; point the action at a form service before going live. --}}
            <form action="/contact" class="md:w-1/2 max-w-lg">
                <div class="mb-6">
                    <label class="block mb-2 text-sm text-paper-dim" for="contact-name">Name</label>

                    <input
                        type="text"
                        id="contact-name"
                        placeholder="Your name"
                        name="name"
                        class="block w-full bg-ink-soft border border-line focus:border-klein-bright rounded-md outline-none text-paper placeholder:text-paper-dim px-4 py-3"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label class="block mb-2 text-sm text-paper-dim" for="contact-email">Email address</label>

                    <input
                        type="email"
                        id="contact-email"
                        placeholder="email@domain.com"
                        name="email"
                        class="block w-full bg-ink-soft border border-line focus:border-klein-bright rounded-md outline-none text-paper placeholder:text-paper-dim px-4 py-3"
                        required
                    >
                </div>

                <div class="mb-8">
                    <label class="block mb-2 text-sm text-paper-dim" for="contact-message">Message</label>

                    <textarea
                        id="contact-message"
                        rows="5"
                        name="message"
                        class="block w-full bg-ink-soft border border-line focus:border-klein-bright rounded-md outline-none appearance-none text-paper placeholder:text-paper-dim px-4 py-3"
                        placeholder="What are you working on?"
                        required
                    ></textarea>
                </div>

                <button
                    type="submit"
                    class="w-full sm:w-auto bg-klein hover:bg-klein-bright text-paper-bright text-sm font-medium tracking-wide uppercase rounded-md cursor-pointer px-8 py-4 transition-colors"
                >Send</button>

                <p class="text-xs text-paper-dim mt-4 mb-0">
                    This is a static site, so the form needs a third-party endpoint (FieldGoal, Formspree, Netlify Forms)
                    wired into <code>action</code> before it can deliver.
                </p>
            </form>
        </div>
    </div>
@stop
