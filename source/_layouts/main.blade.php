<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
    <meta name="theme-color" content="#262626">

    <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}" />
    <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
    <meta property="og:url" content="{{ $page->getUrl() }}" />
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

    <title>{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

    <link rel="home" href="{{ $page->baseUrl }}">
    <link rel="icon" href="{{ $page->favicon }}">
    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

    @if ($page->production)
        <!-- Insert analytics code here -->
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/prismjs/themes/prism.css" rel="stylesheet" />

    @viteRefresh()
    <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
    <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
</head>

<body class="flex flex-col justify-between min-h-screen bg-ink text-paper leading-relaxed font-sans antialiased">
    @php
        // Built once and shared by both nav partials. Blog is dropped when every post is
        // hidden, because Jigsaw's pagination emits no /blog page for an empty collection.
        $navLinks = array_filter([
            'Work' => $projects->isNotEmpty() ? '/work' : null,
            'About' => '/about',
            'Blog' => $posts->count() ? '/blog' : null,
            'Contact' => '/contact',
        ]);
    @endphp

    <header class="sticky top-0 z-20 bg-ink/95 backdrop-blur-sm border-b border-line" role="banner"
        x-data="{ open: false }" @keydown.escape.window="open = false">
        <div class="container flex items-center max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 h-16 md:h-20 gap-4">
            <a href="/" title="{{ $page->siteName }} home"
                class="inline-flex items-baseline gap-2 shrink-0 group">
                <span
                    class="text-base md:text-xl font-semibold tracking-tight text-paper-bright group-hover:text-white transition-colors">
                    Melieqa Rezaei
                </span>
            </a>

            <div class="flex flex-1 justify-end items-center gap-2 md:gap-4">
                {{-- @include('_components.search') --}}

                @include('_nav.menu')

                @include('_nav.menu-toggle')
            </div>
        </div>

        @include('_nav.menu-responsive')
    </header>

    <main role="main" class="flex-auto w-full">
        @yield('body')
    </main>

    <footer class="border-t border-line mt-20" role="contentinfo">
        <div class="container max-w-6xl mx-auto px-5 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-8">
                <div>
                    <p class="font-hand text-2xl text-paper-bright my-0">Let's collaborate.</p>

                    <ul class="list-none pl-0 my-4 space-y-1 text-sm">
                        <li>
                            <span class="text-paper-dim">E-mail:</span>
                            <a class="link-underline" href="mailto:{{ $page->email }}">{{ $page->email }}</a>
                        </li>
                        <li>
                            <span class="text-paper-dim">Tel.:</span>
                            <a class="link-underline" href="tel:{{ $page->phoneLink }}">{{ $page->phone }}</a>
                        </li>
                        <li>
                            <span class="text-paper-dim">Social:</span>
                            <span class="text-paper">{{ $page->social }}</span>
                        </li>
                    </ul>
                </div>

                <div class="text-sm text-paper-dim md:text-right">
                    <p class="my-0">&copy; {{ date('Y') }} {{ $page->siteName }}.</p>
                    <p class="my-0">{{ $page->tagline }}</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/prismjs/prism.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/prismjs/plugins/autoloader/prism-autoloader.min.js"></script>
    @stack('scripts')
</body>

</html>
