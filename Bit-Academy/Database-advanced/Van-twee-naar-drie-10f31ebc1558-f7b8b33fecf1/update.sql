USE `bit_lyceum`;

DROP TABLE IF EXISTS toets_vakken;
DROP TABLE IF EXISTS vakken;


CREATE TABLE vakken (
    id INT NOT NULL AUTO_INCREMENT,
    vak VARCHAR(50) NOT NULL,
    docent VARCHAR(50) NOT NULL,
    telefoon VARCHAR(15) NOT NULL,
    boek VARCHAR(50) NOT NULL,
    toets_id INT NOT NULL,
    toets_naam VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO vakken (vak, docent, telefoon, boek, toets_id, toets_naam)
VALUES
('Nederlands', 'De Wit', '0659475126', 'Nieuw Nederlands', 1, 'Grammatica'),
('Nederlands', 'De Wit', '0659475126', 'Nieuw Nederlands', 2, 'Begrijpend lezen'),
('Engels', 'McDonell', '0689512037', 'Stepping Stones', 1, 'Mondeling'),
('Wiskunde', 'Houwing', '0611539815', 'Getal en Ruimte', 1, 'Algebra'),
('Wiskunde', 'Houwing', '0611539815', 'Getal en Ruimte', 2, 'Meetkunde');


ALTER TABLE vakken DROP COLUMN toets_id;
ALTER TABLE vakken DROP COLUMN vak;
ALTER TABLE vakken DROP COLUMN toets_naam;

CREATE TABLE toets_vakken (
    id INT NOT NULL AUTO_INCREMENT,
    vak VARCHAR(50) NOT NULL,
    toets_naam VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO toets_vakken (vak, toets_naam)
VALUES
('Nederlands', 'Grammatica'),
('Nederlands', 'Begrijpend lezen'),
('Engels', 'Mondeling'),
('Wiskunde', 'Algebra'),
('Wiskunde', 'Meetkunde');

ALTER TABLE vakken RENAME info;