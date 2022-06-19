create table users
(
    id        int unsigned auto_increment,
    name      varchar(50)  not null,
    surname   varchar(70)  not null,
    email     varchar(256) not null,
    password  text         not null,
    birthdate date         not null,
    constraint users_pk
        primary key (id)
);

create unique index users_email_uindex
    on users (email);