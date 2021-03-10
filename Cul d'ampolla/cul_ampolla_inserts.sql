INSERT INTO adreces (via, numero, pis, porta, ciutat, codi_postal, pais) VALUES ("C/Arlanza", 12, 3, "A", "Barcelona", "08001", "España");
INSERT INTO adreces (via, numero, pis, porta, ciutat, codi_postal, pais) VALUES ("Av. Duero", 109, 1, "2", "Alicante", "05621", "España");
INSERT INTO adreces (via, numero, pis, porta, ciutat, codi_postal, pais) VALUES ("Paseo Guadalquivir", 48, "1", "6", "Sevilla", "22451", "España");
INSERT INTO adreces (via, numero, pis, porta, ciutat, codi_postal, pais) VALUES ("Pg. de Gràcia", 101, "4", "A", "Barcelona", "08009", "España");
INSERT INTO adreces (via, numero, pis, porta, ciutat, codi_postal, pais) VALUES ("Av. Mijas", 1, "1", "9", "Fuengirola", "29640", "España");

INSERT INTO clients (nom, telefon, email, data_registre, adreces_id) VALUES ("David Olivares González", "633613188", "davoligon@gmail.com", "20200308", 1);
INSERT INTO clients (nom, telefon, email, data_registre, adreces_id, clients_clients_id) VALUES ("Rosa Roldán Guerrero", "666006600", "rosarolgue@gmail.com", "20200331", 2, 1);
INSERT INTO clients (nom, telefon, email, data_registre, adreces_id, clients_clients_id) VALUES ("Natalia Calaf Busquets", "600125694", "nacabus@gmail.com", "20200401", 3, 2);

INSERT INTO proveidors (name, telefon, fax, nif, adreces_id) VALUES ("Gafas y monturas SL", "912332113", "912332114", "B15265413V", 4);
INSERT INTO proveidors (name, telefon, fax, nif, adreces_id) VALUES ("Monturas y cristales SL", "952463412", "952463413", "M12322334D", 5);

INSERT INTO marques (nom, proveidors_id) VALUES ("Glassic", 2);
INSERT INTO marques (nom, proveidors_id) VALUES ("Gafa Nadal", 1);

INSERT INTO empleats (nom, telefon) VALUES ("Luigi Puig", "668844562");

INSERT INTO ulleres (graduacio_vidre_1, graduacio_vidre2, muntura, color_muntura, color_vidre1, color_vidre2, preu, marques_id, venda_empleat_id) VALUES (2, 4, "flotant", "Verde", "transparent", "azul", 153.35, 2, 1);