## Hướng dẫn sử dụng Sudo Alepay ##

**Giới thiệu:** Đây là package dùng thanh toán qua cổng Alpeay

### Cài đặt để sử dụng ###

- Để có thể sử dụng Package cần require theo lệnh `composer require sudo/alepay`
- Publish file cấu hình tài khoản `php artisan vendor:publish --tag=sudo/alepay/config`. Thay đổi các giá trị liên quan đến tài khoản kết nối với Alepay ở file: `config/alepay`
- Sử dụng method POST để submit giá trị tới link có route name là 'web.alepay'. Chi tiết xem demo tại `/demo-alepay`