create table comments (
  comment_id int not null auto_increment,
  board_id char(20),
  writer_name char(10),
  content text not null,
  regist_day char(20) not null,
  primary key (comment_id)
)