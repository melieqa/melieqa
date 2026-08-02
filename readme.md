# melieqa.com

Portfolio site for Melieqa Rezaei — architect, architectural storyteller and designer.
Built with [Jigsaw](https://jigsaw.tighten.co) (static site generator, Blade templates), Tailwind CSS 4,
Alpine.js and Vite.

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

1. Put files in `source/assets/img/` (they are copied to `/assets/img/...` in the built site).
2. Point the relevant field at them:

| Where | Field |
|---|---|
| Project card + project page hero | `image:` in the project's front matter |
| Project page gallery | `gallery: [...]` in the project's front matter |
| Blog post cover | `cover_image:` in the post's front matter |
| Home and About portrait | the `image` key in the `_components.placeholder-image` include |

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

## Content that still needs a pass

- Portrait images (home, about) and all project imagery
- The blog holds one placeholder post at `source/_posts/making-a-diagram-legible.md`
- The contact form needs a third-party endpoint (FieldGoal, Formspree, Netlify Forms) in its `action`
  before it can deliver — static sites cannot process form posts

## Structure

- `config.php` — site metadata, contact details, collections
- `config.production.php` — production overrides (`baseUrl`)
- `source/_layouts/` — page shells (`main`, `project`, `post`, `category`, `rss`)
- `source/_components/` — reusable partials (placeholder image, project card, timeline, search)
- `source/_projects/`, `source/_posts/`, `source/_categories/` — content collections
- `listeners/` — build hooks that generate `sitemap.xml` and the `index.json` search index
- `source/_assets/css/main.css` — theme tokens (colours, fonts) sampled from the CV
