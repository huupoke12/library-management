# library-management

Library Management project for INT2207 - Group #10

[Demo](https://huupoke-int2207-7-1920ii.herokuapp.com)

## Trạng thái dự án

Chưa hoàn thành. Dự kiến hoàn thành trong ngày 12/07/2020.

## Mục lục

- [Mô tả](#mô-tả)
- [Thành viên nhóm](#thành-viên)
- [Các chức năng](#các-chức-năng)
- [Mô hình](#mô-hình)

## Mô tả

Nhằm hạn chế giấy mực, cũng như công sức viết lách ghi chú trong công việc quản lí thư viện, đây là một ứng dụng được viết nhằm hỗ trợ thủ thư quản lí người dùng mượn sách và trả sách.

Ứng dụng có thể dễ dàng thêm/sửa/xoá thông tin người dùng, lượt mượn, nhập/xuất sách, quản lí việc mượn, tình trạng sách, cũng như tính toán phí và tiền phạt (nếu có).

## Thành viên
* Nguyễn Đức Dũng (18020365)
* Nguyễn Mạnh Hùng (18020583)
* Nguyễn Chính Hữu (18020626)

## Các chức năng

### Tra cứu

| Chức năng          | Lệnh                     |
| ------------------ | ------------------------ |
| Liệt kê thành viên | `SELECT * FROM member;`  |
| Liệt kê sách       | `SELECT * FROM book;`    |

### Quản lí thành viên

| Chức năng                | Lệnh                                                                                      |
| ------------------------ | ----------------------------------------------------------------------------------------- |
| Thêm thành viên          | `INSERT INTO member (national_id, full_name, birth_date, join_date) VALUES (?, ?, ?, ?);` |
| Sửa thông tin thành viên | `UPDATE member SET phone_number = ? WHERE id = ?;`                                        |

### Quản lí sách

| Chức năng           | Lệnh                                                                       |
| ------------------- | -------------------------------------------------------------------------- |
| Thêm sách           | `INSERT INTO book (title, author, publisher, price) VALUES (?, ?, ?, ?);`  |
| Sửa thông tin sách  | `UPDATE book SET isbn = ?, publish_year = ? WHERE id = ?;`                 |
| Nhập thêm sách      | `INSERT INTO book_copy (book_id, import_date, usability) VALUES (?, ?, ?)` |
| Sửa trạng thái sách | `UPDATE book_copy SET usability = ? WHERE id = ?;`                         |

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
