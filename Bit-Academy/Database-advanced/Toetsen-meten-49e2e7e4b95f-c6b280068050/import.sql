DROP DATABASE IF EXISTS bit_lyceum;

CREATE DATABASE bit_lyceum;

USE bit_lyceum;

CREATE TABLE toetsen (
    id int NOT NULL AUTO_INCREMENT,
    onderwerp varchar(50),
    PRIMARY KEY(id)
);

CREATE TABLE cijfers (
    student_id int NOT NULL,
    toets_id int NOT NULL,
    cijfer int,
    PRIMARY KEY(student_id, toets_id)
);

INSERT INTO toetsen (onderwerp)
VALUES
    ('meetkunde'),
    ('bewijzen');

INSERT INTO cijfers (student_id, toets_id, cijfer)
VALUES
    (5, 2, 6),
    (8, 1, 6),
    (7, 1, 7),
    (10, 1, 7),
    (12, 1, 7),
    (5, 1, 7),
    (13, 1, 6),
    (6, 2, 8),
    (2, 2, 8),
    (11, 1, 6),
    (4, 2, 8),
    (8, 2, 8),
    (4, 1, 6),
    (1, 1, 7),
    (3, 1, 8),
    (9, 1, 9),
    (3, 2, 7),
    (6, 1, 5),
    (1, 2, 7),
    (2, 1, 4),
    (7, 2, 7);
