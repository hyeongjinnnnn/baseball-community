create table message (
   num int not null auto_increment,
   send_id char(20), 
   rv_id char(20), 
   subject char(200) not null,
   content text not null, 
   regist_day char(20),
   primary key(num),
   foreign key (send_id) references members(id),
   foreign key (rv_id) references members(id)
) 
