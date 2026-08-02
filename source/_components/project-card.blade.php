<a
    href="{{ $project->getUrl() }}"
    title="{{ $project->title }}"
    class="group flex flex-col border border-line hover:border-paper-dim rounded-md overflow-hidden transition-colors"
>
    @include('_components.placeholder-image', [
        'image' => $project->image,
        'label' => $project->title,
        'alt' => $project->title,
        'ratio' => 'aspect-[4/3]',
    ])

    <div class="flex flex-col flex-1 p-5">
        <p class="text-xs uppercase tracking-[0.18em] text-paper-dim my-0">{{ $project->kind }}</p>

        <h3 class="text-lg md:text-xl font-semibold text-paper-bright mt-2 mb-1 leading-snug">{{ $project->title }}</h3>

        <p class="text-sm text-paper-dim my-0">{{ $project->meta }}</p>

        @if ($project->summary)
            <p class="text-sm text-paper mt-3 mb-0">{{ $project->summary }}</p>
        @endif

        <span class="text-sm text-paper-dim group-hover:text-paper-bright mt-4 transition-colors">View &RightArrow;</span>
    </div>
</a>
