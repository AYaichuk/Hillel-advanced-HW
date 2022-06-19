create table posts
(
    id          int unsigned auto_increment,
    user_id     int unsigned           null,
    category_id int unsigned           null,
    title       varchar(255)           not null,
    body        text                   not null,
    image       text                   not null,
    create_at   datetime               not null,
    updated_at  datetime default NOW() not null,
    constraint posts_pk
        primary key (id),
    constraint posts_categories_id_fk
        foreign key (category_id) references categories (id),
    constraint posts_users_id_fk
        foreign key (user_id) references users (id)
);

create unique index posts_title_uindex
    on posts (title);