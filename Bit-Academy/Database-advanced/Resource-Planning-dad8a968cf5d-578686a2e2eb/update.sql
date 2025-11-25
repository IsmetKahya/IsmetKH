USE `bit_lyceum`;

DROP TABLE IF EXISTS vakken;
DROP TABLE IF EXISTS docenten;
DROP TABLE IF EXISTS vakken_toetsen;

CREATE TABLE docenten (
    id INT NOT NULL AUTO_INCREMENT,
    docent VARCHAR(50) NOT NULL,
    telefoon VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO docenten (docent, telefoon)
VALUES
('De Wit', '0659475126'),
('McDonell', '0689512037'),
('Houwing', '0611539815'),
('McMath', '0612345678'),
('Van Dijk', '0651234567'),
('Jansen', '0645678901'),
('Bakker', '0632109876');

CREATE TABLE vakken (
    id INT NOT NULL AUTO_INCREMENT,
    vak VARCHAR(50) NOT NULL,
    boek VARCHAR(50) NOT NULL,
    docent_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (docent_id) REFERENCES docenten(id)
);

ALTER TABLE vakken MODIFY docent_id INT NULL;

INSERT INTO vakken (vak, boek, docent_id)
VALUES
('Nederlands', 'Nieuw Nederlands', 1),
('Nederlands', 'Nieuw Nederlands', 1),
('Engels', 'Stepping Stones', 2),
('Wiskunde', 'Getal en Ruimte', 3),
('Wiskunde', 'Getal en Ruimte', 3),
('Natuurkunde', 'Natuurkunde boek', 4),
('Biologie', 'Biologie boek', 5),
('Geschiedenis', 'Geschiedenis boek', 6),
('Scheikunde', 'Scheikunde boek', 7),
('Duits', 'Scheikunde boek', NULL),
('Burgerschap', 'Burgerschap boek', NULL),
('Economie', 'Economie boek', NULL);