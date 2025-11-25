DROP DATABASE IF EXISTS bit_lyceum;

CREATE DATABASE bit_lyceum;

USE bit_lyceum;

CREATE TABLE boeken (
    id int NOT NULL AUTO_INCREMENT,
    titel varchar(50),
    prijs int,
    PRIMARY KEY(id)
);

INSERT INTO boeken (titel, prijs)
VALUES
    ('Nieuw Nederlands', 65),
    ('Stepping Stones', 40),
    ('Getal en Ruimte', 85),
    ('Overal NaSk', 75),
    ('Nectar', 60),
    ('Enigma', 45);
