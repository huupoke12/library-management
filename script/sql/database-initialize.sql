-- Tables

CREATE TABLE member (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    national_id VARCHAR(12) NOT NULL UNIQUE,
    full_name VARCHAR(63) NOT NULL,
    birth_date DATE NOT NULL,
    gender BOOLEAN,
    email_address VARCHAR(255),
    phone_number VARCHAR(15),
    note TEXT,

    PRIMARY KEY (id)
);


CREATE TABLE book (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    isbn VARCHAR(13) UNIQUE,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    publisher VARCHAR(127),
    publish_year SMALLINT,
    price INT UNSIGNED NOT NULL,
    total_borrow_count INT UNSIGNED NOT NULL,
    note TEXT,

    PRIMARY KEY (id)
);


CREATE TABLE book_copy (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    book_id INT UNSIGNED NOT NULL,
    import_date DATE,
    usability BOOLEAN NOT NULL,
    borrow_id BIGINT UNSIGNED UNIQUE,
    note TEXT,

    PRIMARY KEY (id)
);


CREATE TABLE borrow (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
    book_copy_id INT UNSIGNED NOT NULL,
    member_id INT UNSIGNED NOT NULL,
    borrow_date DATE NOT NULL,
    required_date DATE NOT NULL,
    return_date DATE,
    deposit INT UNSIGNED NOT NULL,
    rental INT UNSIGNED NOT NULL,
    fine INT UNSIGNED,
    note TEXT,

    PRIMARY KEY (id)
);



-- Foreign keys

ALTER TABLE book_copy
ADD FOREIGN KEY (book_id) REFERENCES book(id),
ADD FOREIGN KEY (borrow_id) REFERENCES borrow(id);


ALTER TABLE borrow
ADD FOREIGN KEY (book_copy_id) REFERENCES book_copy(id),
ADD FOREIGN KEY (member_id) REFERENCES member(id);

