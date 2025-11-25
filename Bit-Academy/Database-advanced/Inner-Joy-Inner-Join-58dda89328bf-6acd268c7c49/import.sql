DROP DATABASE IF EXISTS bit_lyceum;

CREATE DATABASE bit_lyceum;

USE `bit_lyceum`;

CREATE TABLE vakken_toetsen (
    id int NOT NULL AUTO_INCREMENT,
    vak varchar(50) NOT NULL,
    boek varchar(50) NOT NULL,
    toets_1 varchar(50) NOT NULL,
    toets_2 varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO vakken_toetsen (vak, boek, toets_1, toets_2)
VALUES
    ('Nederlands - De Wit (0659475126)', 'Nieuw Nederlands', 'Grammatica', 'Begrijpend lezen'),
    ('Engels - McDonell (0689512037)', 'Stepping Stones', 'Mondeling', ''),
    ('Wiskunde - Houwing (0611539815)', 'Getal en Ruimte', 'Algebra', 'Meetkunde' );
