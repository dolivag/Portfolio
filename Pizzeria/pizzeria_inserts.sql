INSERT INTO provincies (nom_provincia) VALUES ("Barcelona"), ("Girona"), ("Lleida"), ("Tarragona");

INSERT INTO localitats (nom_localitat, provincies_provincies_id) VALUES ("Santa Coloma de Gramanet", 1),
	("Terrassa", 1), ("Quart", 2), ("Salt", 2), ("Balaguer", 3), 
	("Mollerussa", 3), ("Altafulla", 4), ("Cambrils", 4);
    
INSERT INTO clients (nom, cognoms, adreça, codi_postal, telefon, localitat_id) VALUES ("Óscar", "Meza", "C/Aiguablava, 3, 4-1", 43893, "635415263", 7);
INSERT INTO clients (nom, cognoms, adreça, codi_postal, telefon, localitat_id) VALUES ("Rosa", "Melano", "C/Buenavista, 101, 9-B", 08921, "689614352", 1);
INSERT INTO clients (nom, cognoms, adreça, codi_postal, telefon, localitat_id) VALUES ("Antonio", "Puentes", "Av. Riu, 35, bajos", 17242, "619374682",3);

ALTER TABLE botigues ADD nom_botiga VARCHAR(30) NOT NULL;

INSERT INTO botigues (adreça, codi_postal, localitat_id, nom_botiga) VALUES ("C/Roses, 15, baixos", 08221, 2, "Pizza o Plomo");
INSERT INTO botigues (adreça, codi_postal, localitat_id, nom_botiga) VALUES ("Mercat de la Virtud, local 12", 17190, 4, "Il Pizzaiolo");
INSERT INTO botigues (adreça, codi_postal, localitat_id, nom_botiga) VALUES ("Carrer del Mar, 85, baixos", 43850, 8, "Ham-burguesía");

INSERT INTO begudes (nom_producte, descripcio, preu_article) VALUES ("Batido de mango", "Leche y mango. Chimpún", 4.65);
INSERT INTO begudes (nom_producte, descripcio, preu_article) VALUES ("Frappuccino de mejillones", "Hemos jugado a ser dioses. Y hemos perdido", 3.40);
INSERT INTO begudes (nom_producte, descripcio, preu_article) VALUES ("Aperol Spritz", "Si te lo bebes, es bajo tu responsabilidad", 5.00);

INSERT INTO categories_pizza (nom_categoria) VALUES ("Las de temporada"), ("Las del chef"), ("Las vegetarianas"), ("Las top");

INSERT INTO pizzes (nom_producte, descripcio, categories_pizza_id, preu_article) VALUES ("Pizza hawaiana", "Lleva piña. Nada más que añadir, señoría", 2, 9.50);
INSERT INTO pizzes (nom_producte, descripcio, categories_pizza_id, preu_article) VALUES ("Hot&Spicy Pizza", "Pica más que un jersey de lana en agosto al mediodía", 4, 10.50);
INSERT INTO pizzes (nom_producte, descripcio, categories_pizza_id, preu_article) VALUES ("Pizza 20 quesos", "Nos quedamos a 3 quesos del delito contra la salud pública", 3, 8.75);

INSERT INTO hamburgueses (nom_producte, descripcio, preu_article) VALUES ("La pesadilla del cardiólogo", "Si no te da un infarto, te devolvemos el dinero", 12.00);
INSERT INTO hamburgueses (nom_producte, descripcio, preu_article) VALUES ("Hamburguesa Edificio", "Más pisos que el Empire State Building", 18.00);
INSERT INTO hamburgueses (nom_producte, descripcio, preu_article) VALUES ("La Picantita", "Dracarys", 9.35);

INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Alan", "Brito Delgado", "74123569G", "621213663", "repartidor", 3);
INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Cindy", "Nero", "589235486J", "616492187", "cuiner", 2);
INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Lola", "Mento", "332655884R", "679945237", "repartidor", 1);
INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Andrés", "Tresado", "478924652E", "665591733", "cuiner", 3);
INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Elsa", "Pato", "223388451P", "622568947", "repartidor", 2);
INSERT INTO empleats (nom, cognoms, nif, telefon, lloc_de_feina, botiga_id) VALUES ("Armando", "Esteban Quito", "445566712G", "624860244", "cuiner", 1);

INSERT INTO comandes (tipus, data_comanda, client_id, num_begudes, num_hamburgueses, num_pizzes, preu_total, botigues_botigues_id) VALUES
("botiga", NOW(), 1, 4, 3, 1, 35.85, 2);
INSERT INTO comandes (tipus, data_comanda, client_id, num_begudes, num_hamburgueses, num_pizzes, preu_total, botigues_botigues_id) VALUES
("domicili", NOW(), 2, 3, 1, 2, 29.00, 3);
INSERT INTO comandes (tipus, data_comanda, client_id, num_begudes, num_hamburgueses, num_pizzes, preu_total, botigues_botigues_id) VALUES
("domicili", NOW(), 3, 2, 1, 1, 21.30, 1);

INSERT INTO lliurament (data_lliurament, empleat_id, comanda_id) VALUES (NOW(), 3, 2);
INSERT INTO lliurament (data_lliurament, empleat_id, comanda_id) VALUES (NOW(), 2, 3);