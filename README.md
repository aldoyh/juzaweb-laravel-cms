# Juzaweb CMS - Laravel CMS for Your Project

> A powerful and flexible Content Management System built on Laravel.

## About

![https://buymeacoffee.com/juzaweb](https://raw.githubusercontent.com/juzaweb/core/refs/heads/master/assets/public/images/thumbnail.png)
[![Total Downloads](https://img.shields.io/packagist/dt/juzaweb/cms.svg?style=social)](https://packagist.org/packages/juzaweb/cms)
[![GitHub Repo stars](https://img.shields.io/github/stars/juzaweb/cms?style=social)](https://github.com/juzaweb/cms)
[![GitHub followers](https://img.shields.io/github/followers/juzaweb?style=social)](https://github.com/juzaweb)
[![YouTube Channel Subscribers](https://img.shields.io/youtube/channel/subscribers/UCo6Dz9HjjBOJpgWsxkln0-A?style=social)](https://www.youtube.com/@juzaweb)

- [Juzaweb CMS](https://cms.juzaweb.com/) is a Content Management System (CMS) like WordPress developed based on Laravel Framework 11 and web platform whose sole purpose is to make your development workflow simple again.
- Juzaweb CMS is a [Laravel CMS](https://cms.juzaweb.com) was engineered to be easy — for both developers and users. Project develop by Juzaweb Team.

## Documentation

The documentation lives in the [`docs/`](docs) directory:

- **Getting Started**
  - [Installation](docs/getting-started/installation.md)
  - [Update](docs/getting-started/update.md)
  - [Changelog](docs/getting-started/changelog.md)
- **The Basics**
  - [Helpers](docs/the-basics/helpers.md)
  - [Hooks](docs/the-basics/hooks.md)
  - [Settings](docs/the-basics/settings.md)
  - [Translation](docs/the-basics/translation.md)
  - [Permissions](docs/the-basics/permissions.md)
  - [Admin menus](docs/the-basics/menus.md)
  - [Breadcrumb](docs/the-basics/breadcrumb.md)
  - [Thumbnails](docs/the-basics/thumbnails.md)
  - [Sitemap](docs/the-basics/sitemap.md)
  - [Commands](docs/the-basics/commands.md)
  - [Dashboard Analytics Setup](docs/the-basics/google-analytics-setup.md)
- **Modules**
  - [Information](docs/modules/information.md)
  - [Make CRUD](docs/modules/crud.md)
  - [Models](docs/modules/models.md)
  - [Form Fields](docs/modules/fields.md)
  - [Media](docs/modules/media.md)
  - [Routing](docs/modules/routing.md)
  - [Helpers](docs/modules/helpers.md)
  - [Asset Compilation](docs/modules/assets.md)
  - [Commands](docs/modules/commands.md)
- **Themes**
  - [Information](docs/themes/information.md)
  - [Asset Compilation](docs/themes/assets.md)
  - [Theme Commands](docs/themes/commands.md)
  - [Theme Helpers](docs/themes/helpers.md)
  - [Theme Configs](docs/themes/settings.md)
  - [Nav Menus](docs/themes/menus.md)
  - [Templates & Blocks](docs/themes/templates.md)
  - [Widgets](docs/themes/widgets.md)

Find yourself stuck using the CMS? Found a bug? Do you have general questions or suggestions for improving the CMS? Feel free to [create an issue on GitHub](https://github.com/juzaweb/cms/issues), we'll try to address it as soon as possible.

Video Tutorial: <https://www.youtube.com/@juzaweb/videos>

## Requirements

- The modules package requires:
  - PHP 8.2 or higher
  - MySql 8.0 or higher

## Install

### Create project with composer

```
composer create-project --prefer-dist juzaweb/cms blog
```

### Install

Config database in your `.env` file, and run:

```
php artisan juzaweb:install
```

### Neon setup (Postgres + Object Storage + Functions + Realtime)

This project can run on Neon-managed services.

1. Initialize and deploy Neon from the repository root:

```bash
neon init -y --org-id org-little-glade-71075140 --project-id crimson-tooth-90534286 --branch production --services postgres,ai-gateway,object-storage,functions,realtime
neon deploy
```

2. Ensure `.env` (or `.env.local`) contains Neon variables such as:
   - `DATABASE_URL`
   - `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_ENDPOINT_URL_S3`, `AWS_REGION`, `AWS_BUCKET`
   - `NEON_FUNCTION_HELLO_BASE_URL`
   - `NEON_REALTIME_URL`, `NEON_REALTIME_SECRET`
   - `DB_CONNECTION=pgsql`
   - `DB_SQLITE_DATABASE=database/database.sqlite`
   - `DB_FALLBACK_TO_SQLITE=true` (fallback to SQLite when Neon is temporarily unavailable)

3. Verify service wiring end-to-end:

```bash
php artisan neon:healthcheck
```

## Developer utilities

### Sync `.env.example` into sibling `.env` files

Use this when you want to refresh the app defaults without overwriting sensitive local secrets.

```bash
php artisan env:sync
php artisan env:sync --dry-run
php artisan env:sync --files=.env,.env.local --force
php artisan env:sync --only=APP_NAME,APP_ENV,APP_DEBUG --skip=APP_KEY
```

The command reads `.env.example`, merges safe defaults into every sibling `.env` file it can find, skips existing protected values by default, and only updates placeholder or empty values unless `--force` is passed.

### Set the auth background to Bing's image of the day

```bash
php artisan app:use-bing-daily-image
php artisan app:use-bing-daily-image --save-to=juzaweb/images/auth-bg.jpg
```

This downloads the daily Bing image and saves it into the public asset path used by the Laravel auth layout. It is designed to replace the default login-screen background with a fresh image without changing the layout code.

## Contributing

- Contributions are welcome, and are accepted via pull requests. Please review these guidelines before submitting any pull requests.
[https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md](https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md)

## Features

- [x] File manager
- [x] Plugins
- [x] Themes
- [x] Theme Widgets
- [x] Menu builder by post type
- [x] Logs view
- [x] Page block
- [ ] Upload themes
- [ ] Upload plugins
- [ ] **Network (multisite) support**
- [x] Multisite languages
- [x] Social login
  - [x] Google
  - [x] Facebook
  - [x] Tweater
  - [x] Github
  - [x] Instagram
- [ ] User Permission
  - [ ] Check permisson menu
  - [ ] Policies
  - [ ] Check permisson button in views
- [x] Media manager admin page
- [ ] Short Code
- [x] Add image from url
- [ ] Quick edit
- [ ] Preview post
- [ ] Activity logs
- [ ] **Api Support**

## Backend Javascript libraries

- Jquery
- Bootstrap 4
- select2
- font-awesome

## Buy the Original Author a coffee

[![Juzaweb Buy me coffee](https://i.imgur.com/MAqboRu.png)](https://buymeacoffee.com/juzaweb)
