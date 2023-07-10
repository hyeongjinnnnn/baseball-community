create table team_cheer (
  id int auto_increment primary key,
  team_name varchar(50) NOT NULL,
  cheer_count int default 0
);

insert into team_cheer (team_name, cheer_count)
values ('한화', 0),
       ('NC', 0),
       ('SSG', 0),
       ('KT', 0),
       ('키움', 0),
       ('기아', 0),
       ('두산', 0),
       ('LG', 0),
       ('삼성', 0),
       ('롯데', 0);