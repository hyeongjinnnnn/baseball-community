create table members (
    id char(20) not null,
    pass char(20) not null,
    name char(10) not null,
    team char(20) not null,
    email char(80),
    regist_day char(20),
    primary key(id, name)
) 