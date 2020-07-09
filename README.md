# library-management
Library Management project for INT2207 - Group #10

## Trạng thái dự án
Chưa hoàn thành. Dự kiến hoàn thành trước 09/07/2020.

## Mục lục
- [Thành viên nhóm](#thành-viên)
- [Mô tả](#mô-tả)
- [Chức năng](#chức-năng)
- [Bảng dữ liệu](#bảng-dữ-liệu)

## Thành viên
* Nguyễn Đức Dũng (18020365)
* Nguyễn Mạnh Hùng (18020583)
* Nguyễn Chính Hữu (18020626)

## Mô tả
Là ứng dụng hỗ trợ thủ thư quản lí người dùng mượn sách, trả sách.

## Chức năng
Demo một vài chức năng như sau:
| Chức năng                | Lệnh                                                                                            |
| ------------------------ | ----------------------------------------------------------------------------------------------- |
| Liệt kê thành viên       | `SELECT * FROM member;`                                                                         |
| Liệt kê sách             | `SELECT * FROM book;`                                                                           |
| Thêm thành viên          | `INSERT INTO member (national_id, full_name, birth_date, join_date) VALUES (?, ?, ?, ?);`       |
| Sửa thông tin thành viên | `UPDATE member SET phone_number = ? WHERE id = ?;`                                              |
| Thêm sách                | `INSERT INTO book (title, author, publisher, price) VALUES (?, ?, ?, ?);`                       |
| Sửa thông tin sách       | `UPDATE book SET isbn = ?, publish_year = ? WHERE id = ?;`                                      |
| Nhập thêm sách           | `INSERT INTO book_copy (book_id, import_date, usability) VALUES (?, ?, ?)`                      |
| Sửa trạng thái sách      | `UPDATE book_copy SET usability = ? WHERE id = ?;`                                              |
| Tạo lượt mượn            | `INSERT INTO borrow (book_copy_id, member_id, borrow_date, required_date) VALUES (?, ?, ?, ?);` |

## Bảng dữ liệu
* Quyển sách: ID quyển sách, ID sách, ngày nhập kho, tình trạng có thể sử dụng, ID lượt mượn hiện tại, ghi chú.
* Sách: ID sách, ISBN, tên sách, tác giả, nhà xuất bản, năm xuất bản, giá bìa, số lượng đang có có thể sử dụng, số lượt mượn tổng cộng, ghi chú.
* Thành viên: ID thành viên, số CCCD, tên, ngày tháng năm sinh, giới tính, email, số điện thoại, ngày tham gia, ghi chú.
* Lượt mượn: ID lượt mượn, ID quyển sách, ID thành viên, ngày tạo lượt mượn, hạn mượn, ngày trả, tiền đặt cọc, tiền mượn, tiền phạt, ghi chú.

