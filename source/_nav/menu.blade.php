<nav class="hidden md:flex items-center justify-end gap-5 lg:gap-7 text-sm" aria-label="Primary">
    @foreach ($navLinks as $label => $path)
        <a
            title="{{ $page->siteName }} {{ $label }}"
            href="{{ $path }}"
            class="pb-1 border-b-2 transition-colors {{ $page->isActive($path) ? 'text-paper-bright border-klein-bright' : 'text-paper-dim border-transparent hover:text-paper-bright' }}"
        >{{ $label }}</a>
    @endforeach
</nav>
