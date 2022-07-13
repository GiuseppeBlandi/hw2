/*Nome database: tuttof1laravel */
CREATE TABLE users(
    id integer primary key auto_increment,
    name varchar(255) not null,
    surname varchar(255) not null,
    username varchar(16) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null,
    nposts integer default 0,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp
) Engine = InnoDB;

CREATE TABLE posts (
    id integer primary key auto_increment,
    user_id integer not null,
    time timestamp not null default current_timestamp,
    nlikes integer default 0,
    ncomments integer default 0,
    content varchar(256),
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp,
    foreign key(user_id) references users(id) on delete cascade on update cascade
) Engine = InnoDB;

CREATE TABLE likes (
    user_id integer not null,
    post_id integer not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp,
    index xuser(user_id),
    index xpost(post_id),
    foreign key(user_id) references users(id) on delete cascade on update cascade,
    foreign key(post_id) references posts(id) on delete cascade on update cascade,
    primary key(user_id, post_id)
) Engine = InnoDB;

CREATE TABLE comments (
    id integer primary key auto_increment,
    user_id integer not null,
    post_id integer not null,
    time timestamp not null default current_timestamp,
    content varchar(255),
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp,
    index xuser(user_id),
    index xpost(post_id),
    foreign key(user_id) references users(id) on delete cascade on update cascade,
    foreign key(post_id) references posts(id) on delete cascade on update cascade
) Engine = InnoDB;

DELIMITER //
CREATE TRIGGER likes_trigger
AFTER INSERT ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes + 1
WHERE id = new.post_id;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER unlikes_trigger
AFTER DELETE ON likes
FOR EACH ROW
BEGIN
UPDATE posts 
SET nlikes = nlikes - 1
WHERE id = old.post_id;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER comments_trigger
AFTER INSERT ON comments
FOR EACH ROW
BEGIN
UPDATE posts 
SET ncomments = ncomments + 1
WHERE id = new.post_id;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER posts_trigger
AFTER INSERT ON posts
FOR EACH ROW
BEGIN
UPDATE users 
SET nposts = nposts + 1
WHERE id = new.user_id;
END //
DELIMITER ;