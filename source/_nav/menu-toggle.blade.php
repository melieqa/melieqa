<button
    type="button"
    class="md:hidden flex justify-center items-center h-10 w-10 border border-line rounded-md text-paper hover:border-paper-dim focus:outline-none focus-visible:ring-2 focus-visible:ring-klein-bright"
    @click="open = ! open"
    :aria-expanded="open ? 'true' : 'false'"
    aria-controls="mobile-menu"
    aria-label="Toggle navigation"
>
    <svg x-show="! open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="1.8" aria-hidden="true">
        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
    </svg>

    <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="1.8" aria-hidden="true">
        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
    </svg>
</button>
