<div x-data="{
        init(){
            fetch('/index.json')
                .then(response => response.json())
                .then(data => {
                    this.fuse = new window.Fuse(data, {
                        minMatchCharLength: 3,
                        threshold: 0.35,
                        keys: ['title', 'snippet', 'categories'],
                    });
                });
        },
        get results() {
            return this.query && this.fuse ? this.fuse.search(this.query).slice(0, 6) : [];
        },
        get isQuerying() {
            return Boolean(this.query);
        },
        fuse: null,
        searching: false,
        query: '',
        showInput() {
            this.searching = true;
            this.$nextTick(() => {
                this.$refs.search.focus();
            })
        },
        reset() {
            this.query = '';
            this.searching = false;
        },
    }"
    x-cloak
    class="flex flex-1 justify-end items-center text-right"
    @keydown.escape.window="reset()"
>
    <div
        class="absolute md:relative w-full md:w-auto md:flex-1 justify-end left-0 top-full md:top-auto z-10 bg-ink md:bg-transparent px-5 py-3 md:p-0 border-b md:border-b-0 border-line"
        :class="{ 'hidden md:flex': ! searching, 'flex': searching }"
    >
        <label for="search" class="sr-only">Search</label>

        <input
            id="search"
            x-model="query"
            x-ref="search"
            class="relative block h-10 w-full md:w-56 lg:w-64 lg:focus:w-80 bg-ink-soft border border-line focus:border-klein-bright outline-none text-paper placeholder:text-paper-dim text-sm px-4 transition-all duration-200 ease-out rounded-md"
            :class="{ 'rounded-b-none': query }"
            autocomplete="off"
            name="search"
            placeholder="Search"
            type="text"
            @keyup.esc="reset"
            @blur="reset"
        >

        <button
            x-show="query"
            x-cloak
            type="button"
            class="absolute top-3 right-7 md:top-0 md:right-2 md:h-10 leading-none text-2xl text-paper-dim hover:text-paper-bright focus:outline-none"
            @click="reset"
            aria-label="Clear search"
        >&times;</button>

        <div
            x-show="isQuerying"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            class="absolute left-5 right-5 md:left-auto md:right-0 top-14 md:top-12 text-left w-auto md:w-80 lg:w-96"
        >
            <div class="flex flex-col bg-ink-soft border border-line rounded-md shadow-search overflow-hidden">
                <template x-for="(result, index) in results" :key="result.item.link">
                    <a
                        class="bg-ink-soft hover:bg-ink border-b border-line last:border-b-0 text-sm p-4"
                        :href="result.item.link"
                        :title="result.item.title"
                        @mousedown.prevent
                    >
                        <span class="block font-medium text-paper-bright" x-html="result.item.title"></span>

                        <span class="block font-normal text-paper-dim text-xs mt-1 line-clamp-2" x-html="result.item.snippet"></span>
                    </a>
                </template>

                <div x-show="! results.length" class="text-sm text-paper-dim p-4">
                    <p class="my-0">No results for <strong class="text-paper" x-html="query"></strong></p>
                </div>
            </div>
        </div>
    </div>

    <button
        title="Start searching"
        type="button"
        class="flex md:hidden justify-center items-center h-10 w-10 border border-line rounded-md text-paper hover:border-paper-dim focus:outline-none"
        @click.prevent="showInput"
        aria-label="Search"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
            <circle cx="11" cy="11" r="7" />
            <path stroke-linecap="round" d="M20 20l-3.5-3.5" />
        </svg>
    </button>
</div>
