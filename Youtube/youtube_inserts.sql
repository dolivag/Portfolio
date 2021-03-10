INSERT INTO usuaris (email, passwd, nom_usuari, data_naixement, sexe, pais, codi_postal) VALUES ("mailusuario1@gmail.com", "passwd1", "AtomicDev", "19900522", "dona", "France", "38100");
INSERT INTO usuaris (email, passwd, nom_usuari, data_naixement, sexe, pais, codi_postal) VALUES ("mailusuario2@gmail.com", "passwd2", "MassiveDev", "19881207", "home", "Italy", "24129");
INSERT INTO usuaris (email, passwd, nom_usuari, data_naixement, sexe, pais, codi_postal) VALUES ("mailusuario3@gmail.com", "passwd3", "NuclearDev", "20000620", "dona", "Spain", "08921");
INSERT INTO usuaris (email, passwd, nom_usuari, data_naixement, sexe, pais, codi_postal) VALUES ("mailusuario4@gmail.com", "passwd4", "MolecularDev", "19960314", "home", "Brazil", "21240");

INSERT INTO canals (nom_canal, descripcio_canal, data_creacio, usuari_id) VALUES ("Learn with AtomicDev", "PHP Tutorials for everyone", "20200317", 1);
INSERT INTO canals (nom_canal, descripcio_canal, data_creacio, usuari_id) VALUES ("Practise with MassiveDev", "Web Developing from 0 to 100%", "20180801", 2);

INSERT INTO videos (titol, descripcio, grandaria, nom_arxiu, durada, reproduccions, likes, dislikes, estat, canals_canal_id)
VALUES ("Starting with PHP from 0", "Watch this video if you're interested in PHP", "2.4GB", "php-course-session1.mp4","00:24:52", 0, 0, 0, "public", 1);
INSERT INTO videos (titol, descripcio, grandaria, nom_arxiu, durada, reproduccions, likes, dislikes, estat, canals_canal_id)
VALUES ("Make your life easier with SaSS", "You'll learn how to install and use SaSS", "3.5GB", "sass-lesson-session1.mp4","00:32:43", 0, 0, 0, "public", 2);

INSERT INTO etiquetes (nom) VALUES ("Web development"), ("Informatics"), ("Tech"), ("PHP"), ("HTML5"), ("CSS"), ("SASS"), ("MySQL"), ("Laravel");

INSERT INTO video_has_etiquetes (etiqueta_id, video_id) VALUES (1, 1), (2, 1), (3, 1), (4, 1), (8,1), (9, 1), (1, 2), (2, 2), (3, 2), (4, 2), (5,2), (6,2);

INSERT INTO subscripcio (usuari_id, canal_id) VALUES (3, 1), (3, 2), (4, 1);

INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (2, 1, "like");
INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (3, 1, "dislike");
INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (4, 1, "like");
INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (1, 2, "like");
INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (3, 2, "like");
INSERT INTO reaccions (usuaris_usuari_id, videos_video_id, tipus_reacció) VALUES (4, 2, "like");

INSERT INTO comentaris (text_comentari, data_comentari, usuari_id, videos_video_id) VALUES ("Very nice video! Thanks for your help!", NOW(), 4, 1);
INSERT INTO comentaris (text_comentari, data_comentari, usuari_id, videos_video_id) VALUES ("My favourite teacher so far!", NOW(), 2, 1);

INSERT INTO playlists (nom_playlist, data_creacio, estat, usuari_id) VALUES ("PHP videos", DATE(NOW()), "publica", 4);
INSERT INTO playlists (nom_playlist, data_creacio, estat, usuari_id) VALUES ("Watch later", DATE(NOW()), "privada", 3);

INSERT INTO videos_has_playlists (videos_video_id, playlists_playlist_id) VALUES (1, 1), (2, 1), (1, 2);