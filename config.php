<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => 'http://localhost:8000',
    'production' => false,
    'siteName' => 'Melieqa Rezaei',
    'siteDescription' => 'Architectural storyteller and designer. I help architecture become understandable.',
    'siteAuthor' => 'Melieqa Rezaei',

    // contact
    'email' => 'melieqapr@gmail.com',
    'phone' => '+98 990 333 1703',
    'phoneLink' => '+989903331703',
    'social' => '@melieqa',
    'tagline' => 'Architectural Storyteller & Designer',
    'statement' => 'I help architecture become understandable.',

    // Copied out of source/_assets/images by vite-plugin-static-copy, see vite.config.js.
    // Static copies are not Vite entries, so they are referenced by path, not vite().
    'portrait' => '/assets/build/images/melieqa.webp',
    'favicon' => '/assets/build/images/favicon.ico',

    // collections
    'collections' => [
        'projects' => [
            'sort' => 'order',
            'path' => 'work/{filename}',
        ],
        'posts' => [
            'author' => 'Melieqa Rezaei', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => 'blog/{filename}',
        ],
        'categories' => [
            'path' => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],

    'getDate' => function ($page): DateTime {
        return Datetime::createFromFormat('U', (string) $page->date);
    },

    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated).'...'
            : $cleaned;
    },

    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
