# استخدام صورة PHP مع إضافات ضرورية
FROM php:8.2-fpm

# تثبيت الاعتماديات والمكتبات
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    # إضافات PHP المطلوبة
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# الانتقال إلى مسار العمل داخل الصورة
WORKDIR /var/www

# نسخ ملفات المشروع إلى الصورة
COPY . .

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# تثبيت dependencies المشروع
RUN composer install --no-dev --optimize-autoloader

# تعيين الصلاحيات للمجلدات
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# توليد مفتاح التطبيق
RUN php artisan key:generate

# تحسين الأداء
RUN php artisan optimize

# الأمر النهائي لتشغيل الخادم
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]