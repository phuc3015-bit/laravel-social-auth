Nguyễn Trọng Phúc
MSV:23810310391

HƯỚNG DẪN CÀI ĐẶT VÀ CẤU HÌNH
1. Cách cài đặt
Yêu cầu: PHP >= 8.2, Composer, MySQL.

Các bước:

Clone dự án: git clone [Link_Github]

Cài đặt thư viện: composer install

Tạo file cấu hình: cp .env.example .env

Tạo key ứng dụng: php artisan key:generate

Cấu hình Database trong file .env (DB_DATABASE, DB_USERNAME...).

Chạy migration để tạo bảng User: php artisan migrate

Khởi chạy server: php artisan serve

2. Cách cấu hình Google & Facebook OAuth
Google:

Truy cập Google Cloud Console.

Tạo Project mới -> APIs & Services -> Credentials.

Tạo OAuth 2.0 Client ID, thêm Redirect URI: http://localhost:8000/auth/google/callback.

Copy Client ID và Client Secret dán vào file .env.

Facebook:

Truy cập Meta for Developers.

Tạo App mới -> Setup Facebook Login.

Thêm Redirect URI: http://localhost:8000/auth/facebook/callback.

Copy App ID và App Secret dán vào file .env.
