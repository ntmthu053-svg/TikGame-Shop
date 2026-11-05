# TikGame Shop - Web Bán Game Tự Động Kết Nối SePay

## Các file gồm có:
- `index.html`: Giao diện web bán hàng, chi tiết sản phẩm, tạo mã QR VietQR SePay, tải file tự động.
- `sepay_webhook.php`: File nhận webhook từ SePay khi có tiền chuyển về ngân hàng.
- `check_order.php`: API kiểm tra xem đơn hàng đã được thanh toán chưa.

## Cách dùng:
1. Giải nén file `.zip`.
2. Mở `index.html` và chỉnh sửa biến `BANK_CONFIG` ở phần JavaScript thành Số tài khoản & Ngân hàng của bạn.
3. Upload toàn bộ file lên Hosting PHP miễn phí hoặc GitHub Pages.
