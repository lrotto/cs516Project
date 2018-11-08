CREATE TABLE if not exists user (
userid INTEGER(4) NOT NULL auto_increment PRIMARY KEY,
email VARCHAR(256) NOT NULL,
username VARCHAR(64) NOT NULL UNIQUE,
password VARCHAR(64) NOT NULL,
fname VARCHAR(64) NOT NULL,
lname VARCHAR(64) NOT NULL,
access INTEGER(1)
);

CREATE TABLE if not exists booklist (
bookid INTEGER(3) NOT NULL PRIMARY KEY,
bookname VARCHAR(64) NOT NULL,
bookcoverpic VARCHAR(64) NOT NULL,
catid INTEGER(3) NOT NULL,
available INTEGER(1) NOT NULL
);

CREATE TABLE if not exists categories (
catid INTEGER(3) NOT NULL PRIMARY KEY,
category VARCHAR(32) NOT NULL
);

CREATE TABLE if not exists shoppingcart (
userid INTEGER(4) NOT NULL PRIMARY KEY,
bookid INTEGER(3) NOT NULL UNIQUE, 
datereq DATE NOT NULL
);

INSERT INTO user (email, username, password, fname, lname, access)
VALUES ("ckenn@gmail.com", "ckenn", "Password11", "Conrad", "Kennington", 0);
INSERT INTO user (email, username, password, fname, lname, access)
VALUES ("lro@gmail.com", "lro", "Password11", "Linda", "Otto", 0);
INSERT INTO user (email, username, password, fname, lname, access)
VALUES ("jeo@gmail.com", "jeo", "Password11", "John", "Otto", 0);


INSERT INTO categories (catid, category) 
values (1, "Science Fiction");
INSERT INTO categories (catid, category) 
values (2, "Fantasy");
INSERT INTO categories (catid, category) 
values (3, "Non-Fiction");
INSERT INTO categories (catid, category) 
values (4, "Education(CS)");
INSERT INTO categories (catid, category) 
values (5, "Religion");

INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (1, "Dune", "bookpics/book1.jpg", 1, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (2, "Children of Dune", "bookpics/book2.jpg", 1, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (3, "The World Without Us", "bookpics/world-w-out-us.jpg", 5, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (4, "Make Today Matter", "bookpics/maketodaymatter.jpg", 5, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (5, "Start Your Own Business", "bookpics/startbusiness.jpg", 5, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (6, "Fighting the Darkness Within", "bookpics/fightingdarkness.jpg", 5, 1);
