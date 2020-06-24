# library-management
Library Management project for INT2207 - Group #10

## Trạng thái dự án
Chưa hoàn thành. Dự kiến hoàn thành trước 04/07/2020.

## Các thành viên
1. Nguyễn Đức Dũng (18020365)
1. Nguyễn Mạnh Hùng (18020583)
1. Nguyễn Chính Hữu (18020626)

## Các chức năng
* Mượn sách
  * Tạo lượt mượn mới gồm MSSV, ID sách, ngày mượn, hạn mượn, ...
* Trả sách
  * Xoá lượt mượn tương ứng.
* Thông báo sách sắp/đã hết hạn mượn:
  * Dựa vào email, tự động thông báo cho sinh viên về hạn trả sách.
* Thêm/bớt sách
  * Thêm sách: Sách nhập kho.
  * Xoá sách: Sách bị hỏng, mất, sinh viên không trả, ...
* Log lại các sự kiện để tra cứu (Log chỉ được đọc, muốn xoá thì phải xoá file log theo ngày).

## Các cơ sở dữ liệu
* List các sách: ID, ISBN, ngày nhập kho, tình trạng.
* List các loại sách: ISBN, tên sách, tác giả, năm xuất bản, số lượng đang có, thể loại, được mượn nhiều (Hot), giá bìa.
* List sinh viên (Có sẵn, lấy từ Database của trường, chỉ đọc): MSSV, tên, ngày tháng năm sinh, giới tính, khoá+lớp, email.
* List các lượt mượn: ID lượt mượn, MSSV, ID sách, ngày tạo lượt mượn, hạn mượn.
