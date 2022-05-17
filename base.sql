CREATE DATABASE actualite;
create table catégorie(
    id integer not null primary key AUTO_INCREMENT,
    nom varchar(50)
);
create table actu(
    id integer not null primary key AUTO_INCREMENT,
    daty Date,
    titre varchar(200),
    idCategorie integer not null,
    resume varchar(500),
    contenue varchar(1000),
    foreign key(idCategorie) references catégorie(id)
);
create table utilisateur(
    id integer not null primary key AUTO_INCREMENT,
    nom varchar(50),
    mdp varchar(50)
);
INSERT INTO `actualite`.`utilisateur` (
`id` ,
`nom` ,
`mdp`
)
VALUES (
NULL , 'Admin01', 'saveworld.'
);