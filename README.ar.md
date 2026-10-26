# Juzaweb CMS - نظام إدارة المحتوى (CMS) من Laravel لمشروعك

> نظام إدارة محتوى قوي ومرن مبني على Laravel.

## حول المنتج

![Juzaweb](https://raw.githubusercontent.com/juzaweb/core/refs/heads/master/assets/public/images/thumbnail.png)

- [Juzaweb CMS](https://cms.juzaweb.com/) هو نظام لإدارة المحتوى (CMS) يشبه WordPress، تم تطويره باستخدام Laravel 11، ويهدف إلى تبسيط سير العمل البرمجي للمطورين.
- تم تصميم Juzaweb CMS ليكون سهل الاستخدام لكل من المطورين والمستخدمين، وهو من تطوير فريق Juzaweb.

## المتطلبات

- PHP 8.2 أو أحدث
- MySQL 8.0 أو أحدث

## التثبيت

### إنشاء المشروع عبر Composer

```bash
composer create-project --prefer-dist juzaweb/cms blog
```

### التثبيت

اضبط قاعدة البيانات في ملف `.env` ثم قم بتشغيل:

```bash
php artisan juzaweb:install
```

### صفحة الترحيب العامة والوصول المحلي

للسماح للضيوف بعرض صفحة الترحيب العامة بدون تسجيل الدخول في بيئة التطوير المحلية أو في بيئة تم تفعيلها صراحة، أضف:

```bash
APP_ALLOW_PUBLIC_WELCOME=true
```

هذا مفيد لعرض صفحة تسويقية أو معاينة محلية قبل تفعيل الحماية الكاملة للتطبيق.

### إعداد Neon (Postgres + Object Storage + Functions + Realtime)

يدعم المشروع خدمات Neon المُدارة.

1. تهيئة المشروع ونشر خدمات Neon من جذر المشروع:

```bash
neon init -y --org-id org-little-glade-71075140 --project-id crimson-tooth-90534286 --branch production --services postgres,object-storage,functions,realtime
neon deploy
```

2. تأكد من وجود المتغيرات التالية في ملف `.env` أو `.env.local`:
   - `DATABASE_URL`
   - `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY`, `AWS_ENDPOINT_URL_S3`, `AWS_REGION`, `AWS_BUCKET`
   - `NEON_FUNCTION_HELLO_BASE_URL`
   - `NEON_REALTIME_URL`, `NEON_REALTIME_SECRET`
   - `DB_CONNECTION=pgsql`
   - `DB_SQLITE_DATABASE=database/database.sqlite`
   - `DB_FALLBACK_TO_SQLITE=true`

3. تحقق من صحة الربط بين الخدمات:

```bash
php artisan neon:healthcheck
```

## أدوات المطور

### مزامنة `.env.example` مع ملفات `.env` المجاورة

استخدم هذا الأمر عند رغبتك في تحديث القيم الافتراضية للتطبيق دون الكتابة فوق الأسرار الحساسة.

```bash
php artisan env:sync
php artisan env:sync --dry-run
php artisan env:sync --files=.env,.env.local --force
php artisan env:sync --only=APP_NAME,APP_ENV,APP_DEBUG --skip=APP_KEY
```

يقرأ الأمر ملف `.env.example` ويُدرج القيم الآمنة في كل ملف `.env` موجود، ويُتجاهل القيم المحمية افتراضيًا، ويحدث فقط القيم الفارغة أو placeholders ما لم تُمرَّر `--force`.

### تعيين صورة خلفية تسجيل الدخول من صورة Bing اليومية

```bash
php artisan app:use-bing-daily-image
php artisan app:use-bing-daily-image --save-to=juzaweb/images/auth-bg.jpg
```

هذا الأمر يقوم بتنزيل صورة Bing اليومية وحفظها في مسار الأصول المستخدم في تصميم صفحة تسجيل الدخول.

## المساهمة

- نرحب بالمساهمات عبر طلبات السحب (Pull Requests). يرجى مراجعة إرشادات المساهمة قبل إرسال أي طلب.
- [إرشادات المساهمة](https://github.com/juzaweb/cms/blob/master/CONTRIBUTING.md)

## الخصائص

- [x] مدير الملفات
- [x] الإضافات
- [x] القوالب
- [x] عناصر القوالب
- [x] منشئ القوائم حسب نوع المحتوى
- [x] عرض السجلات
- [x] كتل الصفحة
- [ ] رفع القوالب
- [ ] رفع الإضافات
- [ ] **دعم الشبكات المتعددة (Multisite)**
- [x] دعم اللغات المتعددة
- [x] تسجيل الدخول الاجتماعي
  - [x] Google
  - [x] Facebook
  - [x] Twitter
  - [x] GitHub
  - [x] Instagram
- [ ] صلاحيات المستخدم
  - [ ] فحص القائمة
  - [ ] السياسات
  - [ ] فحص الأزرار
- [x] صفحة إدارة الوسائط
- [ ] الأكواد المختصرة
- [x] إضافة صورة من رابط مباشر
- [ ] التحرير السريع
- [ ] المعاينة
- [ ] سجل النشاط
- [ ] **دعم واجهة برمجة التطبيقات (API)**
