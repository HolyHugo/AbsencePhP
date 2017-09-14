create database BS1;

use BS1;

create table VISITEUR (
    idVisiteur integer(11) primary key auto_increment,
    nomV varchar(30) not null,
    dateEmbauche timestamp
);

create table ABSENCE (
    refVisiteur integer(11),
    dateDebut timestamp,
    nbJours integer(11),
    motif varchar(100),
    PRIMARY KEY (refVisiteur, dateDebut)
);

alter table ABSENCE add constraint fk_absencevisiteur foreign key (refVisiteur) references VISITEUR(idVisiteur);