{{-- The CV pairs an uppercase slab with a handwritten kicker, indented under it.
     Usage: @include('_components.section-heading', ['heading' => 'WHO I AM', 'kicker' => 'A short note']) --}}

<div class="mb-8 md:mb-12">
    <h2 class="section-title my-0">{{ $heading }}</h2>

    @if (! empty($kicker))
        <p class="section-kicker my-0 md:ml-16">{{ $kicker }}</p>
    @endif
</div>
