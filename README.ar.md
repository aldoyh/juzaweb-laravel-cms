# Juzaweb CMS - نظام إدارة المحتوى (CMS) من Laravel لمشروعك

> نظام إدارة محتوى قوي ومرن مبني على Laravel.

## حول المنتج (About)

![https://buymeacoffee.com/juzaweb](https://raw.githubusercontent.com/juzaw![https://buymeacoffee.com/juzaweb](https://raw.githubusercontent.com/juzaweb/core/refs/heads/master/assets/public/images/thumbnail.png)
[![Total Downloads](https://img.shields.io/packagist/dt/juzaweb/cms.svg?sty[66D[K
Downloads](https://img.shields.io/packagist/dt/juzaweb/cms.svg?style=socialDownloads](https://img.shields.io/packagist/dt/juzaweb/cms.svg?stye=social)](https://packagist.org/packages/juzaweb/cms)
[![GitHub Repo stars](https://img.shields.io/github/stars/juzaweb/cms?style[60D[K
stars](https://img.shields.io/github/stars/juzaweb/cms?style=social)](httpsstars](https://img.shields.io/github/stars/juzaweb/cms?stylesocial)](https://github.com/juzaweb/cms)
[![GitHub followers](https://img.shields.io/github/followers/juzaweb?style=[65D[K
followers](https://img.shields.io/github/followers/juzaweb?style=social)](hfollowers](https://img.shields.io/github/followers/juzaweb?style=ocial)](https://github.com/juzaweb)
[![YouTube Channel Subscribers](https://img.shields.io/youtube/channel/subs[56D[K
Subscribers](https://img.shields.io/youtube/channel/subscribers/UCo6Dz9HjjBSubscribers](https://img.shields.io/youtube/channel/subsribers/UCo6Dz9HjjBOJpgWsxkln0-A?style=social)](https://www.youtube.com/@juzaweb)

- [Juzaweb CMS](https://cms.juzaweb.com/) هو نظام لإدارة المحتوى (CMS) يشبه[4D[K
يشبه ووردبريس (WordPress) تم تطويره بناءً على إطار عمل Laravel 11 والمنصة ا[1D[K
الويب بهدف وحيد هو تبسيط سير عملك للمطورين.
- Juzaweb CMS هو [نظام إدارة محتوى من Laravel](https://cms.juzaweb.com) تم [K
تصميمه ليكون سهلاً - لكل من المطورين والمستخدمين. تم تطوير المشروع بواسطة ف[1D[K
فريق Juzaweb.

## التوثيق (Documentation)

يقع التوثيق في المجلد [`docs/`](docs):

- **البدء السريع (Getting Started)**
  - [التثبيت (Installation)](docs/getting-started/installation.md)
  - [التحديث (Update)](docs/getting-started/update.md)
  - [سجل التغييرات (Changelog)](docs/getting-started/changelog.md)
- **الأساسيات (The Basics)**
  - [الدوال المساعدة (Helpers)](docs/the-basics/helpers.md)
  - [الخطافات (Hooks)](docs/the-basics/hooks.md)
  - [الإعدادات (Settings)](docs/the-basics/settings.md)
  - [الترجمة (Translation)](docs/the-basics/translation.md)
  - [الصلاحيات (Permissions)](docs/the-basics/permissions.md)
  - [قوائم الإدارة (Admin menus)](docs/the-basics/menus.md)
  - [مسار التنقل (Breadcrumb)](docs/the-basics/breadcrumb.md)
  - [الصور المصغرة (Thumbnails)](docs/the-basics/thumbnails.md)
  - [خريطة الموقع (Sitemap)](docs/the-basics/sitemap.md)
  - [الأوامر (Commands)](docs/the-basics/commands.md)
  - [إعداد تحليلات لوحة التحكم (Dashboard Analytics Setup)](docs/the-basics[23D[K
Setup)](docs/the-basics/google-analytics-setup.md)
- **الوحدات (Modules)**
  - [المعلومات (Information)](docs/modules/information.md)
  - [إنشاء CRUD (Make CRUD)](docs/modules/crud.md)
  - [النماذج (Models)](docs/modules/models.md)
  - [حقول النماذج (Form Fields)](docs/modules/fields.md)
  - [الوسائط (Media)](docs/modules/media.md)
  - [التوجيه (Routing)](docs/modules/routing.md)
  - [الدوال المساعدة (Helpers)](docs/modules/helpers.md)
  - [تجميع الأصول (Asset Compilation)](docs/modules/assets.md)
  - [الأوامر (Commands)](docs/modules/commands.md)
- **القوالب (Themes)**
  - [معلومات القالب (Information)](docs/themes/information.md)
  - [تجميع الأصول للقوالب (Asset Compilation)](docs/themes/assets.md)
  - [أوامر القالب (Theme Commands)](docs/themes/commands.md)
  - [مساعدات القوالب (Theme Helpers)](docs/themes/helpers.md)
  - [إعدادات القوالب (Theme Configs)](docs/themes/settings.md)
  - [القوائم الملاحية (Nav Menus)](docs/themes/menus.md)
  - [القوالب والكتل (Templates & Blocks)](docs/themes/templates.md)
  - [العناصر الواجهة (Widgets)](docs/themes/widgets.md)

إذا وجدت نفسك عالقًا في استخدام نظام CMS؟ أو اكتشفت خطأ (Bug)؟ أو كانت لديك[4D[K
لديك أسئلة عامة أو اقتراحات لتحسين نظام CMS؟ لا تتردد في [إنشاء مشكلة (Issu[5D[K
(Issue) على GitHub](https://github.com/juzaweb/cms/issues)، وسنحاول معالجته[7D[K
معالجتها في أقرب وقت ممكن.

شرح بالفيديو: <https://www.youtube.com/@juzaweb/videos>

## المتطلبات (Requirements)

- تتطلب حزمة الوحدات (Modules package):
  - PHP 8.2 أو أحدث
  - MySql 8.0 أو أحدث

## التثبيت (Install)

### إنشاء المشروع باستخدام Composer

```
composer create-project --prefer-dist juzaweb/cms blog
```

### التثبيت

قم بإعداد قاعدة البيانات في ملفك `.env`، ثم قم بتشغيل:

```
php artisan juzaweb:install
```

## أدوات المطور (Developer utilities)

### مزامنة `.env.example` مع ملفات `.env` الشقيقة

استخدم هذا الأمر عند رغبتك في تحديث القيم الافتراضية للتطبيق دون الكتابة فوق الأسرار المحلية الحساسة.

```bash
php artisan env:sync
php artisan env:sync --dry-run
php artisan env:sync --files=.env,.env.local --force
php artisan env:sync --only=APP_NAME,APP_ENV,APP_DEBUG --skip=APP_KEY
```

يقرأ الأمر ملف `.env.example` ويُدرج القيم الآمنة في كل ملف `.env` مجاور موجود، ويُتجاهل القيم المحمية الحالية افتراضيًا، ويحدّث فقط القيم الفارغة أو placeholders ما لم تُمرّر `--force`.

### تعيين صورة خلفية تسجيل الدخول من صورة Bing اليومية

```bash
php artisan app:use-bing-daily-image
php artisan app:use-bing-daily-image --save-to=juzaweb/images/auth-bg.jpg
```

هذا الأمر يقوم بتنزيل صورة Bing اليومية وحفظها في مسار الأصول العام المستخدم في تخطيط شاشة تسجيل الدخول. وهو مصمم لاستبدال الخلفية الافتراضية دون تعديل تصميم الواجهة نفسه.

## المساهمة (Contributing)

- مرحب بالمساهمات، ويتم قبولها عبر طلبات السحب (pull requests). يرجى مراجعة[6D[K
مراجعة هذه الإرشادات قبل تقديم أي طلب سحب.
[https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md](https://github[https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md](https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md)

## الميزات (Features)

- [x] مدير الملفات (File manager)
- [x] المكونات الإضافية (Plugins)
- [x] القوالب (Themes)
- [x] عناصر القالب الواجهة (Theme Widgets)
- [x] منشئ القوائم حسب نوع المنشور (Menu builder by post type)
- [x] عرض السجلات (Logs view)
- [x] كتلة الصفحة (Page block)
- [ ] رفع القوالب (Upload themes)
- [ ] رفع المكونات الإضافية (Upload plugins)
- [ ] **دعم الشبكة (Multisite)**
- [x] لغات متعددة المواقع (Multisite languages)
- [x] تسجيل الدخول الاجتماعي (Social login)
  - [x] Google
  - [x] Facebook
  - [x] Twitter
  - [x] Github
  - [x] Instagram
- [ ] صلاحيات المستخدم (User Permission)
  - [ ] فحص القائمة للمصلاحات (Check permission menu)
  - [ ] السياسات (Policies)
  - [ ] فحص زر الصلاحية في العروض (Check permission button in views)
- [x] صفحة إدارة الوسائط (Media manager admin page)
- [ ] شفرة قصيرة (Short Code)
- [x] إضافة صورة من رابط (Add image from url)
- [ ] التحرير السريع (Quick edit)
- [ ] معاينة المنشور (Preview post)
- [ ] سجلات النشاط (Activity logs)
- [ ] **دعم API**

## مكتبات جافاسكريبت الخلفية (Backend Javascript libraries)

- Jquery
- Bootstrap 4
- select2
- font-awesome

## اشترِ قهوة للمؤلف الأصلي

[![Juzaweb Buy me coffee](https://i.imgur.com/MAqboRu.png)](https://buymeac[57D[K
coffee](https://i.imgur.com/MAqboRu.png)](https://buymeacoffee.com/juzaweb)

