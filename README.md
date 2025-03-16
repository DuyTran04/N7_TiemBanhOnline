# NGHIÊN CỨU VÀ XÂY DỰNG WEBSITE TIỆM BÁNH

## Tổng quan

Đây là dự án website tiệm bánh trực tuyến được xây dựng trên nền tảng PHP thuần với mô hình MVC (Model-View-Controller). Dự án bao gồm giao diện người dùng, hệ thống quản trị, và tích hợp Chatbot AI để hỗ trợ khách hàng.

## Các tính năng chính

### Giao diện người dùng
- Hiển thị danh mục và sản phẩm bánh
- Tìm kiếm sản phẩm
- Đánh giá sản phẩm
- Giỏ hàng và checkout (Nhưng chưa ổn về thanh toán tiền chuyển khoản)
- Đăng ký, đăng nhập, quản lý tài khoản
- Theo dõi đơn hàng
- Chatbot AI hỗ trợ khách hàng

### Hệ thống quản trị
- Dashboard tổng quan
- Quản lý danh mục
- Quản lý sản phẩm
- Quản lý đơn hàng
- Quản lý người dùng
- Quản lý mã giảm giá
- Quản lý banner
- Quản lý đánh giá
- Quản lý chatbot

### Chatbot AI
- Trả lời các câu hỏi thường gặp
- Hiển thị thông tin sản phẩm mới
- Tìm kiếm sản phẩm
- Kiểm tra trạng thái đơn hàng
- Đề xuất sản phẩm dựa trên lịch sử mua hàng

## Cấu trúc dự án

```
N7_TiemBanhOnline/
┣ Application/
┃ ┣ Controllers/          # Xử lý logic ứng dụng
┃ ┣ Models/               # Thao tác với cơ sở dữ liệu
┃ ┗ Views/                # Giao diện người dùng
┣ Config/                 # Cấu hình
┣ Core/                   # Các thành phần cốt lõi
┣ Helper/                 # Các hàm hỗ trợ
┣ public/                 # Tài nguyên công khai (CSS, JS, hình ảnh)
┣ banbanh.sql             # Cơ sở dữ liệu
┗ index.php               # Điểm vào ứng dụng
```

## Yêu cầu hệ thống

- PHP 7.4 trở lên
- MySQL 5.7 trở lên
- Web server (Apache, Nginx)
- Trình duyệt hỗ trợ JavaScript

## Cài đặt

1. **Cài đặt XAMPP/WAMP/MAMP** tùy thuộc vào hệ điều hành của bạn
2. **Clone mã nguồn** vào thư mục web server (htdocs, www)
3. **Import cơ sở dữ liệu** từ file `banbanh.sql`
4. **Cấu hình kết nối cơ sở dữ liệu** trong `Core/Database.php`
5. **Truy cập website** qua URL `http://localhost/N7_TiemBanhOnline`

## Chatbot AI

Chatbot được xây dựng với các tính năng:

- **Context Awareness**: Duy trì ngữ cảnh cuộc trò chuyện để tạo trải nghiệm tự nhiên
- **Nút gợi ý**: Hiển thị các lựa chọn phổ biến giúp người dùng tương tác nhanh chóng
- **Truy vấn động**: Truy xuất thông tin sản phẩm, đơn hàng từ cơ sở dữ liệu
- **Phân tích và gợi ý**: Đề xuất sản phẩm dựa trên lịch sử mua hàng

### Quản lý Chatbot

Quản trị viên có thể:
- Thêm/sửa/xóa các intent (ý định) của chatbot
- Cấu hình các câu hỏi mẫu và câu trả lời
- Thiết lập context (ngữ cảnh) cho các cuộc trò chuyện
- Xem lịch sử trò chuyện

## Tùy chỉnh và mở rộng

### Thêm Intent mới cho Chatbot

1. Vào Admin Panel -> Chatbot Manager -> Add Intent
2. Nhập Tag, Patterns, Responses theo định dạng yêu cầu
3. Thiết lập Context và chọn Dynamic nếu cần

### Tùy chỉnh giao diện Chatbot

Bạn có thể tùy chỉnh giao diện chatbot trong các file:
- `public/site/css/chatbot.css`: Thay đổi kiểu dáng
- `Application/Views/shared/site/chatbot.php`: Thay đổi cấu trúc HTML
- `public/site/js/chatbot.js`: Thay đổi hành vi JavaScript

## Tác giả

- Tên tác giả/nhóm tác giả

## Giấy phép

Dự án được phát hành dưới giấy phép MIT.
