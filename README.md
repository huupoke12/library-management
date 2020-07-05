# library-management
Library Management project for INT2207 - Group #10

## Trạng thái dự án
Chưa hoàn thành. Dự kiến hoàn thành trước 09/07/2020.

## Thành viên
* Nguyễn Đức Dũng (18020365)
* Nguyễn Mạnh Hùng (18020583)
* Nguyễn Chính Hữu (18020626)

## Chức năng
* Thêm, sửa thành viên
* Thêm, sửa sách
* Tạo (nhập) quyển sách, sửa trạng thái quyển sách
* Tạo các lượt mượn sách, tính tiền đặt cọc và mượn sách, tiền nộp phạt.

## Bảng dữ liệu
* Quyển sách: ID quyển sách, ID sách, ngày nhập kho, tình trạng có thể sử dụng, ID lượt mượn hiện tại, ghi chú.
* Sách: ID sách, ISBN, tên sách, tác giả, năm xuất bản, giá bìa, thể loại, số lượng đang có có thể sử dụng, số lượt mượn tổng cộng, ghi chú.
* Thành viên: ID thành viên, số CCCD, tên, ngày tháng năm sinh, giới tính, email, số điện thoại, ghi chú.
* Lượt mượn: ID lượt mượn, ID quyển sách, ID thành viên, ngày tạo lượt mượn, hạn mượn, ngày trả, tiền đặt cọc, tiền mượn, tiền phạt, ghi chú.

