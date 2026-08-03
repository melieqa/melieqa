# Development

Portfolio site for Melieqa Rezaei — architect, architectural storyteller and designer.
Built with [Jigsaw](https://jigsaw.tighten.co) (static site generator, Blade templates), Tailwind CSS 4,
Alpine.js and Vite.

Pushing to `main` runs `.github/workflows/deploy.yml`, which builds the site and subtree-splits
`build_production/` onto the `gh-pages` branch, which GitHub Pages serves at melieqa.com. The build
output is not tracked on `main`; it exists only on `gh-pages`.

The workflow needs PHP 8.4 or newer — `composer.lock` resolves Symfony 8, which requires
`php >=8.4.1`.

## Running it

```bash
composer install
npm install
npm run dev
```

`npm run dev` starts Vite and rebuilds the site into `build_local/` on change.

To build the production site into `build_production/`:

```bash
npm run prod
```

## Adding images

Every image on the site is a placeholder until a real file is dropped in. Placeholders render as a dashed
box labelled with what belongs there, so nothing looks broken while the portfolio is being filled in.

1. Put files in `source/assets/img/` (copied verbatim to `/assets/img/...` in the built site).
2. Point the relevant field at them:

| Where | Field |
|---|---|
| Project card + project page hero | `image:` in the project's front matter |
| Project page gallery | `gallery: [...]` in the project's front matter |
| Blog post cover | `cover_image:` in the post's front matter |
| Home and About portrait | `portrait` in `config.php` |

The portrait and favicon instead live in `source/_assets/images/` and are copied by
vite-plugin-static-copy to `/assets/build/images/...`. Files copied that way are not Vite entries,
so reference them by path — `vite()` fails the build on them with "Main entry point not found in
Vite manifest".

Example, in `source/_projects/kanoon-center.md`:

```yaml
image: /assets/img/kanoon/hero.jpg
gallery:
  - /assets/img/kanoon/board-1.jpg
  - /assets/img/kanoon/board-2.jpg
```

## Adding a project

Create a Markdown file in `source/_projects/`. Front matter drives the card and page:

```yaml
---
extends: _layouts.project
section: content
order: 1              # controls ordering across the work page
is_visible: true      # false pulls the project from the site entirely
title: Project name
kind: Research-based design · Self-directed
meta: Location · Year
summary: One line shown on the card.
role: What you did
tools: [Rhinoceros, Illustrator]
image: null
gallery: [null, null]
description: Used for the meta description and social preview.
---
```

Text above `<!-- more -->` is used as the excerpt.

## Hiding a project or a post

Set `is_visible: false` in the front matter. Filters on the `projects` and `posts` collections in
`config.php` drop the item before the build runs, so it disappears from its listing, the home page,
its own URL, the search index, `sitemap.xml` and — for posts — the Atom feed, in one step. Omitting
the key leaves an item visible.

Nothing should hard-code a project or post URL — link through the collection so the reference
disappears with the item, as `source/about.blade.php` does for the thesis.

Two things to know when hiding posts:

- Hiding **every** post means Jigsaw's pagination generates no `/blog` page at all. The nav drops
  its Blog link to match (see the `$navLinks` block in `source/_layouts/main.blade.php`).
- A category whose posts are all hidden still gets a page, listing nothing. Delete the file in
  `source/_categories/` if you want it gone.

## Content that still needs a pass

- All project imagery
- Every project currently ships `is_visible: false`, so the work section is empty
- The blog holds one placeholder post at `source/_posts/making-a-diagram-legible.md`
- Project write-ups in `source/_projects/` were drafted from the CV; the prose beyond the CV's own
  sentences, plus the `role` and `tools` fields, still needs checking
- Search is commented out in `source/_layouts/main.blade.php`, but Fuse.js is still bundled and
  `index.json` is still generated on every build

## Structure

- `config.php` — site metadata, contact details, collections
- `config.production.php` — production overrides (`baseUrl`)
- `source/_layouts/` — page shells (`main`, `project`, `post`, `category`, `rss`)
- `source/_components/` — reusable partials (placeholder image, project card, timeline, search)
- `source/_projects/`, `source/_posts/`, `source/_categories/` — content collections
- `listeners/` — build hooks that generate `sitemap.xml` and the `index.json` search index
- `source/_assets/css/main.css` — theme tokens (colours, fonts) sampled from the CV
- `.github/workflows/deploy.yml` — build and publish to `gh-pages`
