create table categories
(
    id          int unsigned auto_increment,
    name        varchar(80)  not null,
    description text         null,
    image       text         null,
    constraint categories_pk
        primary key (id)
);

create unique index categories_name_uindex
    on categories (name);