SELECT B.nom_botiga AS "Botiga", B.adreça AS "Adreça", B.codi_postal AS "Codi Postal", L.nom_localitat AS "Localitat" FROM botigues B, localitats L
WHERE B.localitat_id = L.localitats_id;

SELECT concat(E.nom, " ", E.cognoms) AS "Empleats", E.nif AS "NIF", UPPER(E.lloc_de_feina) AS "Lloc", B.nom_botiga AS "Botiga" FROM empleats E, botigues B 
WHERE E.botiga_id = B.botigues_id AND E.lloc_de_feina = "REPARTIDOR";

SELECT * FROM clients
INNER JOIN localitats ON clients.localitat_id = localitats.localitats_id INNER JOIN provincies ON localitats.provincies_provincies_id = provincies.provincies_id;

SELECT C.comandes_id AS "Nº Comanda", UPPER(C.tipus) AS "Tipus comanda", concat(CL.nom, " ",CL.cognoms) AS "Client", C.preu_total AS "Preu" FROM comandes C, clients CL
WHERE C.client_id = CL. clients_id
ORDER BY C.preu_total DESC;