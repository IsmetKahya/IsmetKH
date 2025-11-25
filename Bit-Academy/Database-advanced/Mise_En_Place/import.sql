DROP DATABASE IF EXISTS foodblog;
CREATE DATABASE foodblog;
USE foodblog;

CREATE TABLE auteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL
);

INSERT INTO auteurs (naam)
VALUES
    ('Mounir Toub'),
    ('Miljuschka'),
    ('Wim Ballieu');

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(255) NOT NULL,
    datum DATETIME NOT NULL,
    img_url VARCHAR(255) NOT NULL,
    inhoud TEXT NOT NULL,
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) REFERENCES auteurs(id)
);

INSERT INTO posts (titel, datum, img_url, inhoud, author_id)
VALUES
    ('Pindakaas', '2020-06-18 13:25:00', 'https://i.ibb.co/C0Lb7R1/pindakaas.jpg',
     'Verwarm de oven voor op 180 °C. ...',
     1),

    ('Baklava', '2020-03-11 10:28:00', 'https://i.ibb.co/ZWVRdPT/baklava.jpg',
     'Voorbereiding ...',
     2);
