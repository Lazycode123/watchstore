# Sử dụng image PHP chính thức với Apache
FROM php:8.1-apache

# Cài đặt các extension PHP cần thiết cho MySQL và PDO
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Cài đặt Composer (trình quản lý PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy mã nguồn của ứng dụng vào thư mục /var/www/html (đây là thư mục mặc định của Apache)
COPY . /var/www/html/

# Cấu hình Apache để hỗ trợ file .htaccess (nếu cần)
RUN a2enmod rewrite

# Cài đặt quyền cho thư mục ứng dụng
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 để container có thể truy cập qua HTTP
EXPOSE 80

# Dùng Apache làm server web
CMD ["apache2-foreground"]
