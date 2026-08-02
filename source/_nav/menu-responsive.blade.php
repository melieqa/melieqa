<nav
    id="mobile-menu"
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="md:hidden border-t border-line bg-ink"
    aria-label="Mobile"
>
    <ul class="list-none my-0 container max-w-6xl mx-auto px-5 sm:px-6 py-2">
        @foreach (['Work' => '/work', 'About' => '/about', 'Blog' => '/blog', 'Contact' => '/contact'] as $label => $path)
            <li class="border-b border-dashed border-line last:border-b-0">
                <a
                    title="{{ $page->siteName }} {{ $label }}"
                    href="{{ $path }}"
                    @click="open = false"
                    class="block py-4 text-base {{ $page->isActive($path) ? 'text-paper-bright' : 'text-paper-dim' }}"
                >{{ $label }}</a>
            </li>
        @endforeach
    </ul>
</nav>
