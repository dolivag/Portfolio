INSERT INTO artistes (nom_artista) VALUES ("Beyonce");
INSERT INTO artistes (nom_artista) VALUES ("Ludovico Einaudi");
INSERT INTO artistes (nom_artista) VALUES ("Rozalén");
INSERT INTO artistes (nom_artista) VALUES ("Rage Against the Machine");
INSERT INTO artistes (nom_artista) VALUES ("Extremoduro");

INSERT INTO albums (titol, any, artistes_artista_id) VALUES ("Yo, minoría absoluta", 2002, 5);
INSERT INTO albums (titol, any, artistes_artista_id) VALUES ("Nuvole Bianche", 2004, 2);
INSERT INTO albums (titol, any, artistes_artista_id) VALUES ("El árbol y el bosque", 2020, 3);
INSERT INTO albums (titol, any, artistes_artista_id) VALUES ("Lemonade", 2016, 1);

INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("A fuego", "5:28", 0, 2);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("La vereda de la puerta de atrás", "00:04:05", 0, 2);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Una mattina", "00:03:23", 0, 3);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Leo", "00:05:09", 0, 3);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Este tren", "00:03:17", 0, 4);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Ua tu vida", "00:03:17", 0, 4);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Sandcastles", "00:03:03", 0, 5);
INSERT INTO cançons (titol, durada, nombre_reproduccions, albums_album_id) VALUES ("Freedom", "00:04:50", 0, 5);

INSERT INTO usuaris_free (email, passwd, nom_usuari, data_naixement, sexe, pais, codi_postal,favorits_favorits_id) VALUES ("davidolivargonzalez@gmail.com", "passwddeprueba", "DavOlGon", "19910523", "home", "Espanya", 08921, 0);