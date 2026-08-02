@extends('_layouts.main')

@section('body')
    <div class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 flex flex-col items-center text-center py-24 md:py-32">
        <h1 class="text-6xl md:text-8xl font-bold leading-none text-paper-bright my-0">404</h1>

        <p class="font-hand text-2xl md:text-3xl text-paper-dim mt-4 mb-0">This one didn't get built.</p>

        <hr class="block w-full max-w-sm mx-auto my-10">

        <p class="text-base md:text-lg text-paper my-0">
            The page you were looking for isn't here.
            <a href="/work" title="All work" class="link-underline">See the work</a>
            or <a href="/" title="Home" class="link-underline">start from the beginning</a>.
        </p>
    </div>
@endsection
