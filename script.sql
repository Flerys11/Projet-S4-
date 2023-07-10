CREATE TABLE genre (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    genre varchar(25) NOT NULL
);

CREATE TABLE users (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(50) NOT NULL DEFAULT '',
    email varchar(100) NOT NULL DEFAULT '',
    id_genre int REFERENCES genre(id_genre),
    password varchar(25) NOT NULL DEFAULT '',
    avatar varchar(255) DEFAULT 'default.jpg',
    created_at datetime NOT NULL,
    is_admin tinyint NOT NULL DEFAULT '0',
    taille int NOT NULL,
    poids int NOT NULL
);

CREATE TABLE histo_morphology (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    taille int NOT NULL,
    poids int NOT NULL,
    updated_at datetime DEFAULT NULL
);

CREATE TABLE code (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    code varchar(255) NOT NULL,
    is_valide int NOT NULL DEFAULT 1
);

CREATE TABLE money_code (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    money numeric(8,2) NOT NULL,
    id_code int REFERENCES code(id)
);

CREATE TABLE wallet (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    money numeric(8,2) NOT NULL
);

CREATE TABLE histo_wallet (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    money int NOT NULL,
    updated_at datetime DEFAULT NULL
);

create table regime(
    id int primary key auto_increment,
    id_utilisateur int references utilisateur(id) not null,
    id_aliment int references regime_aliment(id) not null,
    id_sport references regime_sportif(id) not null,
    taille int,
    poids int
);
create table regime_type(
    id int primary key auto_increment,
    type varchar(50),
);
create table regime_aliment(
    id int primary key auto_increment,
    id_type int references regime_type(id) not null,
    Nom varchar(250) not null,
    prix int,not null
);

create table regime_sportif(
    id int primary key auto_increment,
    id_type int references regime_type(id) not null,
    nom varchar(100) not null,
    poids int
);

insert into regime_aliment values(default,1,'Vary/anana',5000);
insert into regime_aliment values(default,1,'Vary/legume',5000);
insert into regime_aliment values(default,1,'Vary/Salade',4000);
