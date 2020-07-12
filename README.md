# library-management

Library Management project for INT2207 - Group #10

[Demo](https://huupoke-int2207-7-1920ii.herokuapp.com)

## Trạng thái dự án

Hoàn thiện một phần.

## Mục lục

- [Mô tả](#mô-tả)
- [Giảng viên hướng dẫn](#giảng-viên)
- [Thành viên nhóm](#thành-viên)
- [Các chức năng](#các-chức-năng)
- [Mô hình](#mô-hình)

## Mô tả

Nhằm hạn chế giấy mực, cũng như công sức viết lách ghi chú trong công việc quản lí thư viện, đây là một ứng dụng được viết nhằm hỗ trợ thủ thư quản lý sách trong thư viện, quản lý người dùng mượn sách và trả sách.

Ứng dụng có thể dễ dàng thêm/sửa/xoá thông tin người dùng, lượt mượn, nhập/xuất sách, quản lí việc mượn, tình trạng sách, cũng như tính toán phí và tiền phạt (nếu có).

## Giảng viên
*TS. Lê Hồng Hải
*ThS. Nguyễn Thị Thu Trang

## Thành viên
* Nguyễn Đức Dũng (18020365)
* Nguyễn Mạnh Hùng (18020583)
* Nguyễn Chính Hữu (18020626)

## Các chức năng

### Quản lí thành viên

| Chức năng                | Lệnh                                                                                                                                             |
| ------------------------ | -----------------------------------------------------------------------------------------                                                        |
| Xem bảng thông tin       | `SELECT id, national_id, full_name, birth_date, gender FROM member`                                                                              |
| Xem thông tin chi tiết   | `SELECT * FROM member WHERE id = ?;`                                                                                                             |
| Thêm thành viên          | `INSERT INTO member (national_id, full_name, birth_date, gender, email_address, phone_number, join_date, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?);` |
| Sửa thông tin thành viên | `UPDATE member SET phone_number = ? WHERE id = ?;`                                                                                               |

### Quản lí sách

| Chức năng                | Lệnh                                                                                                                          |
| -------------------      | --------------------------------------------------------------------------                                                    |
| Xem bảng thông tin       | `SELECT id, isbn, title, author, publisher, price, borrow_count FROM book;`                                                   |
| Xem thông tin chi tiết   | `SELECT * FROM book WHERE id = ?;`                                                                                            |
| Thêm sách                | `INSERT INTO book (isbn, title, author, publisher, publish_year, price, borrow_count, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?);` |
| Sửa thông tin sách       | `UPDATE book SET isbn = ?, publish_year = ? WHERE id = ?;`                                                                    |
| Nhập thêm sách           | `INSERT INTO book_copy (book_id, import_date, usability) VALUES (?, ?, ?)`                                                    |
| Sửa trạng thái sách      | `UPDATE book_copy SET usability = ? WHERE id = ?;`                                                                            |

### Quản lí lượt mượn

| Chức năng         | Lệnh                                                                                            |
| ----------------- | ----------------------------------------------------------------------------------------------- |
| Tạo lượt mượn     | `INSERT INTO borrow (book_copy_id, member_id, borrow_date, required_date) VALUES (?, ?, ?, ?);` |
| Cập nhật trả sách | `UPDATE borrow SET return_date = ? WHERE id = ?;`                                               |

## Mô hình

### Mô hình thực thể liên kết

![ER Diagram](https://i.imgur.com/VXfA7Vu.png)

### Mô hình cơ sở dữ liệu

![Database](https://i.imgur.com/TB4ic58.png)
