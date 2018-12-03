CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE if not exists login_attempts (
    user_id INTEGER(11) NOT NULL,
    time VARCHAR(30) NOT NULL
);

CREATE TABLE if not exists booklist (
bookid INTEGER(3) NOT NULL PRIMARY KEY,
bookname VARCHAR(64) NOT NULL,
bookcoverpic VARCHAR(64) NOT NULL,
catid INTEGER(3) NOT NULL,
chkdusr VARCHAR(64),
available INTEGER(1) NOT NULL
);

CREATE TABLE if not exists categories (
catid INTEGER(3) NOT NULL PRIMARY KEY,
category VARCHAR(32) NOT NULL
);

CREATE TABLE if not exists shoppingcart (
username VARCHAR(64) NOT NULL,
bookname VARCHAR(64) NOT NULL
);


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
values (5, "Start Your Own Business", "bookpics/startbusiness.jpg", 3, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (6, "Fighting the Darkness Within", "bookpics/fightingdarkness.jpg", 3, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (7, "Lost Avatar", "bookpics/lostavatar.jpg", 2, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (8, "Dragon Prince", "bookpics/dragonprince.jpg", 2, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (9, "Creative Code", "bookpics/creativecode.jpg", 4, 1);
INSERT INTO booklist (bookid, bookname, bookcoverpic, catid, available) 
values (10, "Coding as a Playground", "bookpics/codingplay.jpg", 4, 1);

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `fname`, `salt`) VALUES
(1, 'test_user', 'test@example.com', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'Test', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
