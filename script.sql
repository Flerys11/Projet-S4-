CREATE TABLE genre (
    id int PRIMARY KEY AUTO_INCREMENT,
    genre varchar(25) NOT NULL
);

CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(50) NOT NULL DEFAULT '',
    email varchar(100) NOT NULL DEFAULT '',
    id_genre int REFERENCES genre(id_genre),
    password varchar(255) NOT NULL DEFAULT '',
    avatar varchar(255) DEFAULT 'default.jpg',
    created_at datetime NOT NULL,
    is_admin tinyint NOT NULL DEFAULT '0',
    taille int,
    poids numeric(6,3)
);

CREATE TABLE histo_morphology (
    id int PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    poids int NOT NULL,
    updated_at datetime NOT NULL
);

CREATE TABLE valeur (
    id int PRIMARY KEY AUTO_INCREMENT,
    valeur numeric(8,2) NOT NULL
);

CREATE TABLE codes (
    id int PRIMARY KEY AUTO_INCREMENT,
    codes varchar(255) NOT NULL,
    id_valeur int references valeur(id),
    is_valide int NOT NULL DEFAULT 1
);

CREATE TABLE wallet (
    id int PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    money numeric(8,2) 
);

CREATE TABLE histo_wallet (
    id int PRIMARY KEY AUTO_INCREMENT,
    id_users int REFERENCES users(id),
    money int NOT NULL,
    updated_at datetime NOT NULL
);

create table regime_type(
    id int primary key auto_increment,
    type varchar(255) 
);

create table type_plat (
    id int primary key auto_increment,
    type varchar(255) 
);

create table plat (
    id int primary key auto_increment,
    id_type_plat int references type_plat(id),
    id_type_regime int references regime_type(id),
    nom text not null, 
    prix numeric(8,2) not null
);

create table sport (
    id int primary key auto_increment,
    id_type int references regime_type(id),
    nom varchar(255) not null
);

create table regime_aliment(
    id int primary key auto_increment,
    id_user int references users(id) 
);

create table details_aliments(
    id int primary key auto_increment,
    id_regime_aliment int references regime_aliment(id),
    id_plat int references plat(id),
    poids numeric(6,2) not null
);

create table regime_sportif(
    id int primary key auto_increment,
    id_user int references users(id) 
);

create table details_sportif(
    id int primary key auto_increment,
    id_regime_sportif int references regime_sportif(id),
    id_sport int references sport(id),
    duree numeric(5,2)
);

create table regime(
    id int primary key auto_increment,
    id_plat int references regime_aliment(id),
    id_sport int references regime_sportif(id),
    poids int not null,
    date_regime date not null
);

create table histo_regime (
    id int primary key auto_increment,
    id_user int references users(id),
    id_regime int references regime(id),
    date_debut date not null,
    date_fin date not null
);

INSERT INTO genre VALUES 
    (null, 'Homme'),
    (null, 'Femme');

INSERT INTO users VALUES 
    (null, 'Rakoto', 'rakoto@gmail.com', 1, '12345', 'default.jpg', '2023-07-02 12:05:01', 1, null, null),
    (null, 'Rabe', 'rabe@gmail.com', 1, '56789', 'default.jpg', '2023-07-04 09:00:01', 0, 163, '80.400'),
    (null, 'Rasoa', 'rasoa@gmail.com', 2, '54321', 'default.jpg', '2023-07-05 14:25:30', 0, 160, '65.100'),
    (null, 'Rose', 'rose@gmail.com', 2, '98765', 'default.jpg', '2023-07-10 22:00:45', 0, 158, '70'),
    (null, 'Randri', 'rose@gmail.com', 1, '02580', 'default.jpg', '2023-07-10 12:20:45', 0, 170, '75.900');

INSERT INTO valeur VALUES
    (null, '100'),
    (null, '200'),
    (null, '500'),
    (null, '1000'),
    (null, '2000'),
    (null, '5000'),
    (null, '10000'),
    (null, '20000');

INSERT INTO codes VALUES 
    (null, '8365491723', 1, 1),
    (null, '9056213487', 2, 1),
    (null, '7214569832', 3, 1),
    (null, '3698471025', 4, 1),
    (null, '5487120369', 5, 1),
    (null, '1029384756', 6, 1),
    (null, '6543210987', 7, 1),
    (null, '9876543210', 8, 1),
    (null, '1234567890', 5, 1),
    (null, '7890123456', 6, 1),
    (null, '2468135790', 7, 1),
    (null, '1357924680', 8, 1),
    (null, '8024671359', 6, 1),
    (null, '6940281357', 7, 1),
    (null, '5719203846', 8, 1);

INSERT INTO wallet VALUES
    (null, 3, '10000'),
    (null, 3, '1000');

INSERT INTO regime_type VALUES
    (null, 'Reduire son poids'),
    (null, 'Augmenter son poids');

INSERT INTO type_plat VALUES
    (null, 'Petit-Dejeuner'),
    (null, 'Dejeuner'),
    (null, 'Diner');

INSERT INTO plat VALUES
    (null, 1, 1, 'Thé vert ou café sans sucre, Fromage blanc au muesli et compote de fruits maison', '8000'),
    (null, 2, 1, 'Rouleaux de printemps crevettes et pomme verte, Salade de pousses de soja, Fruit de saison', '15000'),
    (null, 3, 1, 'Hachis parmentier à la courge et au poulet, Salade, Fromage blanc', '5000'),
    (null, 1, 1, 'Thé vert ou café, Oeufs brouillés au fromage frais et toast de pain complet', '7000'),
    (null, 2, 1, 'Salade de carottes, Poulet aux olives et citron confit, Semoule, Fruit de saison', '10000'),
    (null, 3, 1, 'Sauté de tofu aux noix de cajou et haricots plats, Riz brun, Fromage frais, Fruit frais', '7000'),
    (null, 1, 2, '2 tranches de pain de mie, 2 cuillères à café de beurre de cacahuète, 2 cuillères à café de confiture de fruits rouges', '7000'),
    (null, 2, 2, 'Petits pois, riz à grains ronds, pesto, beurre, oignon, bouillon de volaille, quelques feuilles de basilic', '25000'),
    (null, 3, 2, 'Farine, olives noires dénoyautées, levure fraîche, huile olive, eau tiède, romarin, sel', '7000'),
    (null, 1, 2, 'Farine, sucre roux, beurre de cacahuètes, beurre mou, œuf, levure chimique', '9000'),
    (null, 2, 2, 'Poulet, gruyère râpé, farine, œufs, lait entier, beurre, noix de muscade, sel et poivre', '25000'),
    (null, 3, 2, 'Oeufs, sucre, farine, beurre, levure chimique', '10000');
    
INSERT INTO sport VALUES
    (null, 1, 'Course à pied'),
    (null, 1, 'Zumba'),
    (null, 1, 'Planche'),
    (null, 1, 'Pompes'),
    (null, 1, 'Natation');
    