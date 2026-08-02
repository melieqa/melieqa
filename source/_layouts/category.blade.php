@extends('_layouts.main')

@section('body')
    <div class="container max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 py-14 md:py-20">
        @include('_components.section-heading', ['heading' => $page->title, 'kicker' => 'Category'])

        <div class="text-base md:text-lg border-b border-dashed border-line mb-12 pb-8">
            @yield('content')
        </div>

        <div class="space-y-10">
            @foreach ($page->posts($posts) as $post)
                @include('_components.post-preview-inline')

                @if (! $loop->last)
                    <hr class="my-10">
                @endif
            @endforeach
        </div>
    </div>
@stop
