<article class="flex flex-col">
    <p class="text-xs uppercase tracking-[0.18em] text-paper-dim my-0">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h3 class="text-xl md:text-2xl font-semibold mt-2 mb-3 leading-snug">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="text-paper-bright hover:text-white transition-colors"
        >{{ $post->title }}</a>
    </h3>

    <p class="text-sm md:text-base text-paper my-0">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="text-sm text-paper-dim hover:text-paper-bright transition-colors mt-4"
    >Read &RightArrow;</a>
</article>
