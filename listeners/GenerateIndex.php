<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    /**
     * Collections exposed to the Fuse.js search index.
     */
    protected $collections = ['projects', 'posts'];

    public function handle(Jigsaw $jigsaw)
    {
        $data = collect($this->collections)
            ->flatMap(function ($collection) use ($jigsaw) {
                return $jigsaw->getCollection($collection)->map(function ($page) use ($jigsaw, $collection) {
                    return [
                        'title' => $page->title,
                        'categories' => $collection === 'projects' ? [$page->kind] : $page->categories,
                        'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                        'snippet' => $collection === 'projects' ? $page->summary : $page->getExcerpt(),
                    ];
                })->values();
            })
            ->values();

        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data));
    }
}
