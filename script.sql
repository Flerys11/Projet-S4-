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
    updated_at datetime NOT NULL
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
    money numeric(8,2) 
);

CREATE TABLE histo_wallet (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    money int NOT NULL,
    updated_at datetime NOT NULL
);

create table regime_type(
    id int primary key auto_increment,
    type varchar(255) 
);

create table aliments (
    id int primary key auto_increment,
    nom varchar(255) not null, 
    id_type int references regime_type(id) not null,
    prix numeric(8,2) not null
);

create table sports (
    id int primary key auto_increment,
    id_type int references regime_type(id) not null,
    nom varchar(255) not null
)

create table regime_aliment(
    id int primary key auto_increment
);

create table details_aliments(
    id int primary key auto_increment,
    id_regime_aliment int references regime_aliment(id) not null,
    id_aliments int references aliments(id) not null,
    poids numeric(6,2) not null
);

create table regime_sportif(
    id int primary key auto_increment
);

create table details_sportif(
    id int primary key auto_increment,
    id_regime_sportif int references regime_sportif(id) not null,
    id_sports int references sports(id) not null,
    duree numeric(5,2)
);

create table regime(
    id int primary key auto_increment,
    id_user int references users(id) not null,
    id_aliment int references regime_aliment(id) not null,
    id_sport int references regime_sportif(id) not null,
    poids int not null,
    date_regime date not null
);

create table histo_regime (
    id int primary key auto_increment,
    id_user int references users(id) not null,
    id_regime int references regime(id) not null,
    date_debut date not null,
    date_fin date not null
);


